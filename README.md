# Espresso-Admin

<b style="color: red">NB: This project has been deprecated. It's works anyway, but I suggest you to take a look to a modern springboot reimplementation
  with embedded webserver and administration panel: <a href="https://emanuelepaiano.github.io/jespresso/index.html">jEspresso Guest Portal</a></b>
<a href="https://github.com/emanuelepaiano/espresso-portal">Espresso PHP Portal</a>'s backend, based on cakephp 3.x
![alt tag](https://github.com/emanuelepaiano/espresso-admin/blob/master/screenshots/1.png)

***
### How to test (works in mysql-mode only)

***
<ul>
<li> Install <a href="https://github.com/emanuelepaiano/espresso-portal">Espresso Frontend</a> and cURL php extension</li>
<li> 1. Unzip this folder to remote hard drive</li>
<li> 2. Import db_setup/hotspot.sql into mysql database</li>
<li> 3. Run cakephp debug server with bin/cake server --host [remoteserver_ipaddress]</li>
<li> 4. Change mysql options into config/app.php</li>
<li> 5. Import test data session.sql into hotspot db (optional)</li>
<li> 7. change admin password and delete db_setup folder</li>
<li> 7. Open your browser to "http://[remoteserver_ipaddress]:8765/" and login with user admin@backend.local and
   password: espresso </li>

***

### LICENSE
This software is released under GPL3 Term License

***

### FUTURE RELEASES
I'm working for Linux ready hotspot distro with Espresso Frontend and Espresso-Admin. Will be available for Raspberry Pi 2-3 and X86/x64 platforms.

### AUTHOR
Emanuele Paiano - nixw0rm [at] gmail [dot] com

***

### SUPPORT ME
If you like this project, consider a little donation. At least you can offer me a coffee.. :)

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.me/emanuelepaiano)

***
