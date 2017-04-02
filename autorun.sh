#!/bin/bash

#---------------------------------------------------------------
# c0ded by  : alinko a.k.a shutdown57
# contact   : alinkokomansuby@gmail.com
# Thanks to :
# indoXploit.or.id - stackoverflow.com - php.net - curl.haxx.se
#---------------------------------------------------------------
# copyright (c) 2k17 linuXcode.org
#-------------------------------------------------------------
if [[ `whoami` == "root" ]]; then
	php /opt/avb/avb.php
else
	echo "[+] Kamu belum menjadi Mode Sage. :v"
	echo "[+] sage maksutnya root "
fi
