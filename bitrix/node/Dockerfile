FROM centos-systemd

ADD ./bitrix.repo /etc/yum.repos.d/bitix.repo

RUN yum clean all && \
    yum install -y epel-release && \
    yum install -y nodejs redis push-server net-tools mlocate sudo && \
    updatedb

WORKDIR /etc/init.d
RUN ./push-server-multi reset

ADD ./redis.conf /etc/redis.conf

RUN usermod -g bitrix redis

EXPOSE 8010
EXPOSE 8011
EXPOSE 8012
EXPOSE 8013
EXPOSE 8014
EXPOSE 8015
EXPOSE 9010
EXPOSE 9011