#!/usr/bin/env bash
# Change to our current version of the site
cd /var/www/live/current

# You could put the site into a maintenance mode here

# Migrate down the database
php bin/console doctrine:migration: