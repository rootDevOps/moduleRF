# moduleRF
Module MFRC522
--------------------

Activar P4 SPI
> sudo raspi-config

Reiniciar RPi
> sudo reboot

Verificar si existe el proceso spi_bcm2835
> lsmod | grep spi

Actualizar los Repos
> sudo apt-get update -y && sudo apt-get upgrade -y

Instalar Python(opcional)
> sudo apt-get install python2.7-dev -y

Instalar la libreria SPI
> cd ~
> git clone https://github.com/lthiery/SPI-Py.git #Existe un Folk dentro de rootDevOps

> cd ~/SPI-Py
> sudo python setup.py install

Instalar la libreria del módulo
> cd ~
> git clone https://github.com/pimylifeup/MFRC522-python.git #Existe un Folk dentro de rootDevOps

