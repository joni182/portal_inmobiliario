#!/bin/sh

if [ "$1" = "travis" ]
then
    psql -U postgres -c "CREATE DATABASE portal_inmobiliario_test;"
    psql -U postgres -c "CREATE USER portal_inmobiliario PASSWORD 'portal_inmobiliario' SUPERUSER;"
else
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists portal_inmobiliario
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists portal_inmobiliario_test
    [ "$1" != "test" ] && sudo -u postgres dropuser --if-exists portal_inmobiliario
    sudo -u postgres psql -c "CREATE USER portal_inmobiliario PASSWORD 'portal_inmobiliario' SUPERUSER;"
    [ "$1" != "test" ] && sudo -u postgres createdb -O portal_inmobiliario portal_inmobiliario
    sudo -u postgres createdb -O portal_inmobiliario portal_inmobiliario_test
    LINE="localhost:5432:*:portal_inmobiliario:portal_inmobiliario"
    FILE=~/.pgpass
    if [ ! -f $FILE ]
    then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE
    then
        echo "$LINE" >> $FILE
    fi
fi
