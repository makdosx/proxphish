#!/bin/bash

sudo /etc/init.d/apache2 restart

IPV4=$(hostname -I|cut -f1 -d ' ')

firefox "http://"$IPV4 &



