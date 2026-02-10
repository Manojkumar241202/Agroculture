#!/bin/bash
# Install script for Wasmer deployment
# This script handles composer installation gracefully

if [ -f "composer.json" ]; then
    echo "Found composer.json, running composer install..."
    composer install --no-dev --no-scripts --no-interaction
else
    echo "composer.json not found, skipping composer install..."
    exit 0
fi

