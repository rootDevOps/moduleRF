#!/usr/dev/env python
import requests, time

id = 687901711282
text = "CPU_Test"

requests.post("web/controllers/controller_record.php", data={'submit': 'Insert', 'idtag': id })



requests.post("web/controllers/controller_user.php", data={'submit': 'Update', 'user': text, 'tag': id })
