#!/bin/bash
#echo "This scripts does Stackato setup related to filesystem."
FS=$STACKATO_FILESYSTEM
if [ -s $FS/configuration.php ]
  then
    echo "Configuration file exists. Removing installation folder..."
    rm -rf installation/
else
    echo "Configuration file not found. Creating..."
    touch $FS/configuration.php

    # create folders in the shared filesystem
    mkdir -p $FS/images
fi

echo "Migrating data to shared filesystem..."
cp -r www/images/* $FS/images

echo "Symlink to files in shared filesystem..."
rm -f www/configuration.php
ln -s $FS/configuration.php www/configuration.php

echo "Symlink to folders in shared filesystem..."
rm -fr www/images
ln -s $FS/images www/images

echo "All Done!"
