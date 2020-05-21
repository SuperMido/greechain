import os
import pickle
import sys
import numpy as np
import pandas as pd
import tensorflow as tf
import tensorflow_datasets as tfds

# Constant
BUFFER_SIZE = 1000
BATCH_SIZE = 32
TAKE_SIZE = 800
ENCODER_FILE = "endcoder.pkl"
MODEL_FILE = "model_trained.keras"

# Read data
train_df = pd.read_csv('train.csv')

# Create dataset tensor for model
labeled_dataset = tf.data.Dataset.from_tensor_slices((train_df['comment'], train_df["label"]))
labeled_dataset = labeled_dataset.shuffle(BUFFER_SIZE, reshuffle_each_iteration=False)

# Create vocabulary and tokenize
tokenizer = tfds.features.text.Tokenizer()
vocabulary_set = set()
for text_tensor, _ in labeled_dataset:
  some_tokens = tokenizer.tokenize(text_tensor.numpy())
  vocabulary_set.update(some_tokens)
vocab_size = len(vocabulary_set) + 1

# Encode dataset
encoder = tfds.features.text.TokenTextEncoder(vocabulary_set)

def encode(text_tensor, label):
  encoded_text = encoder.encode(text_tensor.numpy())
  return encoded_text, label
  
def encode_map_fn(text, label):
  encoded_text, label = tf.py_function(encode, 
                                       inp=[text, label], 
                                       Tout=(tf.int32, tf.int32))
  encoded_text.set_shape([None])
  label.set_shape([])
  return encoded_text, label

all_encoded_data = labeled_dataset.map(encode_map_fn)

# Split for train and test data 
train_data = all_encoded_data.take(TAKE_SIZE).shuffle(BUFFER_SIZE)
train_data = train_data.padded_batch(BATCH_SIZE, padded_shapes=([None],[]))

test_data = all_encoded_data.skip(TAKE_SIZE)
test_data = test_data.padded_batch(BATCH_SIZE, padded_shapes=([None],[]))

# Create Sequence model 
model = tf.keras.Sequential()
model.add(tf.keras.layers.Embedding(vocab_size, 64))
model.add(tf.keras.layers.Bidirectional(tf.keras.layers.LSTM(64)))

for units in [64, 64]:
  model.add(tf.keras.layers.Dense(units, activation='relu'))

model.add(tf.keras.layers.Dense(3))
model.compile(optimizer='adam',
              loss=tf.keras.losses.SparseCategoricalCrossentropy(from_logits=True),
              metrics=['accuracy'])
# Train model 
history = model.fit(train_data, epochs=10, validation_data=test_data)
# Evaluate model
eval_loss, eval_acc = model.evaluate(test_data)
print("Evaluate Loss: {}, Evaluate Accuracy: {}", eval_loss, eval_acc)

with open(ENCODER_FILE, 'wb') as EF:
    pickle.dump(encoder, EF)
'''
# serialize model to JSON
model_json = model.to_json()
with open("MODEL_FILE", "w") as json_file:
    json_file.write(model_json)
# serialize weights to HDF5
model.save_weights("model.h5")
print("Saved model to disk")
'''
# Save keras model
model.save(MODEL_FILE)
print("Saved model to disk")
