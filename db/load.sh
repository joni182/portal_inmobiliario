#!/bin/sh

BASE_DIR=$(dirname $(readlink -f "$0"))
if [ "$1" != "test" ]
then
    psql -h localhost -U portal_inmobiliario -d portal_inmobiliario < $BASE_DIR/portal_inmobiliario.sql
fi
psql -h localhost -U portal_inmobiliario -d portal_inmobiliario_test < $BASE_DIR/portal_inmobiliario.sql
