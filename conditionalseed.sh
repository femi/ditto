#!bin/bash
if [ -d /var/lib/mysql/hatebook ];
then 
	echo "Database already seeded.  Press enter to continue.";
else 
	echo "No database found, seeding...";
	mysql < /home/ditto/seedscripts/script.sql;
	echo "Seeding complete.  Press enter to continue.";
fi
