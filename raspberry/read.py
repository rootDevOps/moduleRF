#!/usr/dev/env python
import RPi.GPIO as GPIO
import SimpleMFRC522
import requests, time

reader = SimpleMFRC522.SimpleMFRC522()

try:
    print("Esperando tag... ")
    id, text = reader.read();
    idstr = str(id)
    requests.post("/web/controllers/controller_record.php", data={'submit': 'Insert', 'idtag': idstr })
    print(id)
    print(text)

finally:
    GPIO.cleanup()
