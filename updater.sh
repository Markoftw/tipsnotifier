#!/bin/sh
cd /var/www/tipsnotifier/
while [ true ]
do
php check_tips.php
sleep 30
done
