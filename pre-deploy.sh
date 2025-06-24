#!/bin/bash

echo "🚀 Menyiapkan direktori Laravel sebelum deploy..."

mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs

chmod -R 775 storage bootstrap/cache

echo "✅ Direktori disiapkan!"
