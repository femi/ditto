# hatebook

- Install apache2 (sudo apt-get install apache2)
- Update apt repositories (sudo apt-get update)
- Install nodejs (sudo apt-get install nodejs)
- Install npm (sudo apt-get install npm)

- To configure apache2's root from /var/www/:
	- edit /etc/apache2/sites-available/000-default.conf, changing the "DocumentRoot /var/www" line to point at a custom folder
	- In the same file, create an Alias to the /resources/album_content directory:

		Alias /album_content/ "/your/absolute/path/to/resources/album_content/"
		<Directory "/your/absolute/path/to/resources/album_content/">
	  	  Options FollowSymLinks
	  	  AllowOverride None
	  	  Require all granted
		</Directory>
	
	- edit /etc/apache2/apache2.conf, changing "<Directory /var/www/ >" to the preferred directory
	- In the same file, and in the same <Directory> tag, change AllowOverride None to AllowOverride All (to enable the .htaccess file)
	- Ensure that mod_rewrite is enabled (type sudo a2enmod rewrite into terminal)
	- Restart the server: sudo service restart apache2

	- Ensure that album_content permissions are setup correctly (git needs write permissions)
