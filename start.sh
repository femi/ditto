/usr/sbin/apache2ctl -D FOREGROUND &
service mysql start &&
mysql < /home/ditto/seedscripts/script.sql &
bin/bash
