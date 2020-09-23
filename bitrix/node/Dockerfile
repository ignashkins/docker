FROM centos-systemd

ADD ./bitrix.repo /etc/yum.repos.d/bitix.repo

RUN yum clean all && \
    yum install -y epel-release && \
    yum install -y nodejs redis push-server net-tools mlocate sudo && \
    updatedb


WORKDIR /etc/init.d
ADD ./push-server-multi /etc/init.d/push-server-multi
RUN chmod 755 ./push-server-multi && chown bitrix:bitrix ./push-server-multi

ADD ./push_multi_config /etc/sysconfig/push-server-multi
RUN chown bitrix:bitrix /etc/sysconfig/push-server-multi

WORKDIR /usr/lib/systemd/system
ADD ./push-server.service push-server.service
RUN chmod 755 ./push-server.service && chown bitrix:bitrix ./push-server.service

RUN /etc/init.d/push-server-multi reset

ADD ./redis.conf /etc/redis.conf
RUN usermod -g bitrix redis && chown redis:root /etc/redis.conf && chmod 644 /etc/redis.conf

ADD ./start.sh /start.sh

RUN chmod +x /start.sh

WORKDIR /

EXPOSE 8010 8011 8012 8013 8014 8015 9010 9011

CMD ["./start.sh"]