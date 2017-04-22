# Espresso-Admin based on Cakephp 3.x framework - Work in progress

How to test (mysql-mode Only)

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

LICENSE: GPL3
