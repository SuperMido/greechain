import socket
import sys
import json

# Connect the socket to the port where the server is listening
server_address = ('127.0.0.1', 1080)
while True:
    comment = input("Your comment here: ")
    # Create a TCP/IP socket
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    print('connecting to %s port %s' % server_address)
    sock.connect(server_address)
    try:
        # Send data
        message = {"id": 1, "comment": comment}
        message = json.dumps(message)
        print('sending "%s"' % message)
        sock.sendall(message.encode('utf-8'))
        print('Receiving data ...')
        data = sock.recv(1024)
        data = json.loads(data.decode('utf-8'))
        print ( 'received "%s"' % data)
    except Exception as e:
        print(e)
    finally:
        sock.shutdown(socket.SHUT_RDWR)
        sock.close()