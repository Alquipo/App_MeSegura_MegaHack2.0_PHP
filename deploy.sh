#!/bin/bash
echo "Copy public folder to public_html/poupa-app-megahack and move files do applications/poupa-app-megahack"
#rsync -rv ./public/ ./public_html/poupa-app-megahack
mkdir applications
mkdir applications/poupa-app-megahack/
mv * -f ./applications/poupa-app-megahack/
mkdir public_html
mkdir public_html/poupa-app-megahack
rsync -rv ./applications/poupa-app-megahack/public/* ./public_html/poupa-app-megahack/
mv .env-deploy -R ./applications/poupa-app-megahack/.env
mv .* ./applications/poupa-app-megahack/
