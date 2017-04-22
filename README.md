# Espresso-Admin - Work in progress

<a href="https://github.com/emanuelepaiano/espresso-portal">Espresso PHP Portal</a>'s backend is a cakephp 3.x based backend

![alt tag](https://github.com/emanuelepaiano/espresso-admin/blob/master/screenshots/1.png)

***
### How to test (mysql-mode Only)

***
0. Install Espresso Frontend
1. Unzip this folder to remote hard drive
2. Import db_setup/hotspot.sql into mysql database
3. Run cakephp debug server with bin/cake server --host [remoteserver_ipaddress]
4. Open your browser to "http://[remoteserver_ipaddress]:8765/" using

   user: admin@backend.local
   password: espresso

5. Change mysql options into config/app.php
6. Import session.sql into hotspot db (optional)
8. change admin password and delete db_setup folder

***

### LICENSE
This tool is released under GPL3 License

***

### FUTURE RELEASES
I'm working for embedded Linux iso with Espresso Frontend and Backend

### AUTHOR
Emanuele Paiano - nixw0rm [at] gmail [dot] com

***

### SUPPORT ME
If you like this project, consider a little donation. At least you can offer me a coffee.. :)

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.me/emanuelepaiano)

***
