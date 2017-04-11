/usr/sbin/apache2ctl -D FOREGROUND &
service mysql start &&
bash /home/ditto/conditionalseed.sh &
bin/bash
