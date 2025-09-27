#!/usr/bin/env bash
set -e

DB=web_tim_phongtro
PASS=123

sudo service mysql start

mysql -u root -p$PASS -e "CREATE DATABASE IF NOT EXISTS ${DB} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

HAS_TABLES=$(mysql -N -B -u root -p$PASS -e "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='${DB}';")
if [ "$HAS_TABLES" -eq 0 ]; then
  echo "[init-db] Importing schema..."
  mysql -u root -p$PASS ${DB} < database/data_btl.sql
else
  echo "[init-db] DB already initialized, skip import."
fi
