#!/usr/bin/env bash
# 
# serve-website.sh - chriskempson.com
#
# Fires up PHP-CLI's in-build webserver and dishes out the files within 
# 'public'. Depening on your Terminal you can Ctrl+Click the printed URL to 
# open it up in your default browser.

printf "\n---- Point your browser at http://127.0.0.1:8000\n\n" 
php -S 127.0.0.1:8000 -t public