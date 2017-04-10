s1=mysqlshow | grep -w "hatebook" | wc -l

if [ $s1 -le 0 ]
then 
	mysql < /home/ditto/seedscripts/script.sql
fi
