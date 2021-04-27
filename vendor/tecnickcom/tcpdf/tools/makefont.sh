#!/bin/bash

rm ../fonts/fonta* -f
php ./tcpdf_addfont.php -b -t TrueTypeUnicode -f 32 -i FontAwesome.ttf