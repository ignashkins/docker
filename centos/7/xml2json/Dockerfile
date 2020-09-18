FROM centos:7

ENV container docker

RUN yum -y update; yum install -y epel-release ; yum -y install wget vim net-tools nmon git zsh python-pip; \
pip install https://github.com/hay/xml2json/zipball/master; \
chmod +x /usr/bin/xml2json; \
wget http://ftp.riken.jp/Linux/dag/redhat/el7/en/x86_64/rpmforge/RPMS/uni2ascii-4.18-1.el7.rf.x86_64.rpm; \
rpm -i uni2ascii-4.18-1.el7.rf.x86_64.rpm; \
sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)" "" --unattended; \
sed -i 's/robbyrussell/af-magic/' ~/.zshrc;

RUN yum -y install systemd; yum clean all; \
(cd /lib/systemd/system/sysinit.target.wants/; for i in *; do [ $i == systemd-tmpfiles-setup.service ] || rm -f $i; done); \
rm -f /lib/systemd/system/multi-user.target.wants/*;\
rm -f /etc/systemd/system/*.wants/*;\
rm -f /lib/systemd/system/local-fs.target.wants/*; \
rm -f /lib/systemd/system/sockets.target.wants/*udev*; \
rm -f /lib/systemd/system/sockets.target.wants/*initctl*; \
rm -f /lib/systemd/system/basic.target.wants/*;\
rm -f /lib/systemd/system/anaconda.target.wants/*;

ENTRYPOINT ["/usr/sbin/init"]