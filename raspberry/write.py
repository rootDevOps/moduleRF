import requests, time
import RPi.GPIO as GPIO
import SimpleMFRC522

reader = SimpleMFRC522.SimpleMFRC522()

try:
    text = raw_input('Ingresar usuario: ')
    print('Acercar el tag ...')
    reader.write(text)
    print('Listo!')
    id, text_old = reader.read()
    r = requests.post("http://localhost/module_rf/web/controllers/controller_user.php", data={'submit': 'Update', 'user': text, 'tag': id })

finally:
    GPIO.cleanup()
    
