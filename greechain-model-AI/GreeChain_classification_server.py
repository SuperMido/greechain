import os
import multiprocessing
import time
import socket
import _thread
import pickle
import json
import sys
import numpy as np
import tensorflow as tf
import tensorflow_datasets as tfds
from tensorflow.keras.models import load_model

# Constant
ENCODER_FILE = "endcoder.pkl"
MODEL_FILE = "model_trained.keras"
MODEL_WEIGHT_FILE = "model.h5"
#HOST = "127.0.0.1"
HOST = ""
AI_PORT = 1080

# Load model data
encoder = pickle.load(open(ENCODER_FILE, 'rb'))
'''
# load json and create model
json_file = open(MODEL_FILE, 'r')
loaded_model_json = json_file.read()
json_file.close()
loaded_model = model_from_json(loaded_model_json)
# load weights into new model
loaded_model.load_weights(MODEL_WEIGHT_FILE)
print("Loaded model from disk")
'''
model=load_model(MODEL_FILE)
print("Loaded model from disk") 

# Compile model
model.compile(optimizer='adam',
              loss=tf.keras.losses.SparseCategoricalCrossentropy(from_logits=True),
              metrics=['accuracy'])

# Create server for AI
cores = multiprocessing.cpu_count()
print('Number of cores will be used for AI:', cores)
ai_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
ai_socket.bind((HOST, AI_PORT))
ai_socket.listen(10)
print("I'm ready for serving on port 1080...")
while True:
    conn, addr = ai_socket.accept()
    with conn:
        print('Connected by', addr)
        try:
            data = conn.recv(1024)
            if not data:
                break
            data = data.decode("utf-8")
            data = json.loads(data)
            print("Data received: ", data)
            id_cmt = data["id"]
            print("id : ", id_cmt)
            comment = data["comment"]
            print("comment: ", comment)
            encoded_cmt = encoder.encode(comment)
            print("encoded_cmt: ", encoded_cmt)
            label = model.predict_classes(encoded_cmt)[0]
            label = str(label)
            print("label: ", label)
            send_data = {"id": id_cmt, "label": label}
            send_data = json.dumps(send_data)
            print("Sending data...")
            conn.sendall(send_data.encode('utf-8'))
            print("Finish send data: ", send_data)
        except Exception as e:
            print("Exception occured: ", e)
            label = "0.5"
            print("label: ", label)
            send_data = {"id": id_cmt, "label": label}
            send_data = json.dumps(send_data)
            print("Sending data...")
            conn.sendall(send_data.encode('utf-8'))
            print("Finish sendind 0.5 data: ", send_data)
