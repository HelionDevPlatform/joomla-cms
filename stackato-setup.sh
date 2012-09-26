#!/bin/bash
#echo "This scripts does Stackato setup related to filesystem."
if [ -e "$STACKATO_FILESYSTEM"/configuration.php ]
  then
    echo "Configuration file exists. Removing installation folder..."
    rm -rf installation/
else
    echo "Configuration file not found. Creating..."
    touch "$STACKATO_FILESYSTEM"/configuration.php
fi
echo "Cleaning up..."
ln -s "$STACKATO_FILESYSTEM"/configuration.php configuration.php
echo "All Done!"
