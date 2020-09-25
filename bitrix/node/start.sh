#!/bin/sh

echo "FUCK YOU SPILBERG"

/etc/init.d/push-server-multi reset

sudo -u redis /usr/bin/redis-server /etc/redis.conf



