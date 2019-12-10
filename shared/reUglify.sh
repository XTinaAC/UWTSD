#!/bin/bash

# 2019-12-09 ︎☯️ Created by Zhao Ning
# Close the terminal or use "ps -a" to kill Sass processes

# Regenerate minified JS files

cd /Users/mariacarter/Downloads/MyWebsite/Ning/node_modules/uglify-js/bin

(uglifyjs ../../../js/signin.js -o ../../../js/signin.min.js -c --source-map "url='signin.min.js.map', filename='signin.min.js'") &

(uglifyjs ../../../js/index.js -o ../../../js/index.min.js -c --source-map "url='index.min.js.map', filename='index.min.js'") &

(uglifyjs ../../../vendor/bootstrap/js/bootstrap.js -o ../../../vendor/bootstrap/js/bootstrap.min.js -c --source-map "url='bootstrap.min.js.map', filename='bootstrap.min.js'") &

(uglifyjs ../../../vendor/bootstrap/js/bootstrap.bundle.js -o ../../../vendor/bootstrap/js/bootstrap.bundle.min.js -c --source-map "url='bootstrap.bundle.min.js.map', filename='bootstrap.bundle.min.js'") &

(uglifyjs ../../../vendor/jquery/jquery.js -o ../../../vendor/jquery/jquery.min.js -c --source-map "url='jquery.min.js.map', filename='jquery.min.js'") &

(uglifyjs ../../../vendor/jquery/jquery.slim.js -o ../../../vendor/jquery/jquery.slim.min.js -c --source-map "url='jquery.slim.min.js.map', filename='jquery.slim.min.js'") &

(uglifyjs ../../../vendor/jquery/jquery.slim.js -o ../../../vendor/jquery/jquery.slim.min.js -c --source-map "url='jquery.slim.min.js.map', filename='jquery.slim.min.js'") &

# Recompile Scss files
(sass --style compressed --watch ../../../scss/index/index.scss ../../../css/index.css) &

(sass --style compressed --watch ../../../scss/signin/signin.scss ../../../css/signin.css) &