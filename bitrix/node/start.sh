#!/bin/sh

/usr/bin/redis-server /etc/redis.conf

sleep 2

chown redis:bitrix /tmp/redis.sock

ls -la /etc | grep redis
ls -la /tmp

/etc/init.d/push-server-multi systemd_start

/bin/sh