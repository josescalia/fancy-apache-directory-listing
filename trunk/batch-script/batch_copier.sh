#!/bin/bash
#Loop to find directory and sub directory
for i in $(find ./* -type d)
do
   echo "Copying index.php file to $i/" 
   cp -r index.php $i
   echo "Done"
done
