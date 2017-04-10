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

	- Ensure that album_content permissions are setup correctly (git needs write permissions, for example)
		- album_content must be owned by the www-data user group
	- sudo service restart apache2

### Mac OSX
- sudo vi /etc/apache2/httpd.conf
- edit httpd.conf "DocumentRoot /Library/WebServer/Documents" line to point at a custom folder
- In the same section change `AllowOverride None` to `AllowOverride All`
- Uncomment `LoadModule rewrite_module libexec/apache2/mod_rewrite.so`
- Setup album_content permissions (must be owned by _www user group, and must have write permissions)

## Docker
- Build the site image (docker build -t mysite .)
- First time: create a container (docker run --name ditto -i -v /var/lib/mysql -t -p 8080:80 mysite /bin/bash)
	- This starts the container in interactive mode and forwards port 80 inside the container to port 8080 on the host.
- Start an existing container to get persistent database data (docker start -i ditto)

## Troubleshooting
-Check that apachectl is running (apachectl restart)
-Check that mysql is running (service mysql restart)
