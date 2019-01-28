#!/usr/dev/env python
import RPi.GPIO as GPIO
import SimpleMFRC522
import requests, time


reader = SimpleMFRC522.SimpleMFRC522()

try:
    text = raw_input('Ingresar Usuario: ')
    print('Acercar el Tag correspondiente')
    id, text_old = reader.read()
    print('Usuario anterior: ' + text_old)
    reader.write(text)
    print('Usuario actual: ' + text)
    idstr = str(id)
    requests.post("/web/controllers/controller_user.php", data={'submit': 'Update', 'user': text, 'idtag': idstr })
    print('Listo')

finally:
    GPIO.cleanup()
