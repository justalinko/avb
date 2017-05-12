#!/bin/bash

#---------------------------------------------------------------
# c0ded by  : alinko a.k.a shutdown57
# contact   : alinkokomansuby@gmail.com
# Thanks to :
# indoXploit.or.id - stackoverflow.com - php.net - curl.haxx.se
#---------------------------------------------------------------
# copyright (c) 2k17 linuXcode.org
#-------------------------------------------------------------

#/* AutoVisitor Blog v2.8
#\* c0ded by : shutdown57 a.k.a alinko
#/*----------------------------------
#\*| Hargai karya orang kawand. :)  
#/*| Jangan kaya BOCAH ganti nama author segala.
#\*| Kalo cuma bisa "pake" ya, pake saja.. gak usah sok tau,
#/*| Ganti Nama author segala, Emang situ dah Pro?
#\*| Kalo dah "PRO" Bisa semua nya,buat sendiri lah bego.
#/*| Nyadar kalo cuma bisa "pake" , hargai gan!
#\*| NB : Setidaknya kalo recode tulis "recode by: " dan "Original code by:  "
#/*|    - Biar apa? biar gak bego kayak bocah.
#\*----------------------------------
#*/

if [[ `whoami` == "root" ]]; then
	php /opt/avb/__avb__.php
else
	echo "[+] Kamu belum menjadi Mode Sage. :v"
	echo "[+] sage maksutnya root "
fi
