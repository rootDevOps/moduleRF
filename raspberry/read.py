#!/usr/dev/env python
import time
import RPi.GPIO as GPIO
import SimpleMFRC522

reader = SimpleMFRC522.SimpleMFRC522()

try:
    id, text = reader.read();
    requests.post("/web/controllers/controller_record.php", data={'submit': 'Insert', 'idtag': id })
    print(id)
    print(text)

finally:
    GPIO.cleanup()
