#!/bin/bash

echo 'copying profile pictures to album folders..'
cp -vr ./seedphotos/* ../resources/album_content/
sudo chown -R $USERNAME:www-data ../resources/album_content/
sudo chmod -R 775 ../resources/album_content/
