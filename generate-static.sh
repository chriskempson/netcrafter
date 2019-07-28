#!/usr/bin/env bash
# 
# generate-static.sh - chriskempson.com
#
# Generates a static version of a locally hosted website and warns the user
# of any broken internal links.

STATIC_DIR="./static"
DOMAIN="127.0.0.1"
PORT="8000"

# Uncommenting this will create a version that works offline without being 
# hosted locally as links such as 'pages/about' will become 
# 'pages/about/index.php' and so on.
# PORTABLE="--convert-links" 

# Off we go
printf "\n---- Scraping site with WGET...\n\n"

# Delete the previous scrape
rm --force --recursive $STATIC_DIR/*

# Build the static site by scraping localhost with wget and save the output
# of wget for processing with grep
RESULT=$(wget --recursive --page-requisites --no-parent --no-host-directories \
    --execute robots=off --domains $DOMAIN --directory-prefix=$STATIC_DIR \
    --restrict-file-names=nocontrol \
    $PORTABLE \
    http://$DOMAIN:$PORT/robots.txt \
    http://$DOMAIN:$PORT \
    2>&1)

# Display broken links
# Shows 4 lines above match so we can see the requested URL that has an issue
echo "$RESULT" | grep -B4 -i "failed\|error";

# Display stats
# For the curiously minded
echo "$RESULT" | grep -i "^finished\|^downloaded"

# The shows over
printf "\n---- Static site was exported to $STATIC_DIR\n\n"
