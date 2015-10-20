#!/bin/bash
#echo "This scripts does HPE Helion Stackato setup related to filesystem."
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
cp -r htdocs/images/* $FS/images

echo "Symlink to files in shared filesystem..."
rm -f htdocs/configuration.php
ln -s "$FS"/configuration.php htdocs/configuration.php

echo "Symlink to folders in shared filesystem..."
rm -fr htdocs/images
ln -s $FS/images htdocs/images

echo "All Done!"
