import time
import RPi.GPIO as GPIO
import SimpleMFRC522

reader = SimpleMFRC522.SimpleMFRC522()

try:
    id, text = reader.read();
    r = requests.post("http://localhost/module_rf/web/controllers/controller_user.php", data={'submit': 'Insert', 'idtag': id })
    print(id)
    print(text)

finally:
    GPIO.cleanup()
