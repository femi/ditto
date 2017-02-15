# hatebook

- Install apache2 (sudo apt-get install apache2)
- Update apt repositories (sudo apt-get update)
- Install nodejs (sudo apt-get install nodejs)
- Install npm (sudo apt-get install npm)

- To configure apache2's root from /var/www/:
	- edit /etc/apache2/sites-available/000-default.conf, changing the "DocumentRoot /var/www" line to point at a custom folder
	- edit /etc/apache2/apache2.conf, changing "<Directory /var/www/ >" to the preferred directory
	- sudo service restart apache2
