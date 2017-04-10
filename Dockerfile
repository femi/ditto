FROM ubuntu:latest
MAINTAINER John Dowell <John@Dowell.io>

# Install apache, PHP, and supplimentary programs. openssh-server, curl, and lynx-cur are for debugging the container.
RUN apt-get update && apt-get -y upgrade && DEBIAN_FRONTEND=noninteractive apt-get -y install \
apache2 php7.0 php7.0-mysql libapache2-mod-php7.0 curl lynx-cur vim mysql-server-5.7

# Enable apache mods.
RUN a2enmod php7.0
RUN a2enmod rewrite

# Update the PHP.ini file, enable <? ?> tags and quieten logging.
RUN sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php/7.0/apache2/php.ini
RUN sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php/7.0/apache2/php.ini

# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Complete dodgy MySQL install so that the socket works
RUN mkdir -p /var/run/mysqld && chown mysql:mysql /var/run/mysqld

# Expose apache.
EXPOSE 80

# Copy this repo into place.
ADD . /home/ditto

# Add a simple vim config
ADD docker/vimrc /root/.vimrc

# Add album_content directory and change its privacy settings
RUN mkdir /home/ditto/resources/album_content && chown $USERNAME:www-data /home/ditto/resources/album_content \
&& chmod -R 775 /home/ditto/resources/album_content

# Update the default apache settings, pointing /var/www to the repo
ADD docker/apache-config.conf /etc/apache2/sites-enabled/000-default.conf
ADD docker/apache2.conf /etc/apache2/apache2.conf

ENTRYPOINT sh /home/ditto/start.sh
