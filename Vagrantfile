$haproxy =<<SCRIPT
apt-get update
apt-get install -y haproxy
cp /tmp/haproxy.cfg /etc/haproxy/haproxy.cfg
systemctl restart haproxy
SCRIPT

$varnish =<<SCRIPT
apt-get install -y varnish
cp /tmp/default.vcl /etc/varnish/default.vcl
sed -i "s/localhost:6082/:6082/" /lib/systemd/system/varnish.service
systemctl daemon-reload
service varnish restart
cat /etc/varnish/secret
SCRIPT

$mysql = <<SCRIPT
apt-get update
apt-get install -y mysql-server
sed -i "s/^bind-address.*/bind-address = 10.10.10.5/" /etc/mysql/mysql.conf.d/mysqld.cnf
mysql -e "CREATE USER 'ciber'@'%' IDENTIFIED BY 'supersegura1';"
mysql -e "create database wordpress;"
mysql -e "Grant all privileges on wordpress.* TO 'ciber'@'%'"
systemctl restart mysql
SCRIPT

$redisserver = <<SCRIPT
apt-get update
apt-get install -y redis
sed -i "s/bind 127.0.0.1*/bind 127.0.0.1 10.10.10.5/" /etc/redis/redis.conf
systemctl restart redis
SCRIPT

$nginx =<<SCRIPT
apt-get update
apt-get install -y nginx mysql-client 
cp /tmp/ejemplo.conf /etc/nginx/conf.d/ejemplo.conf
rm /etc/nginx/sites-enabled/default
service nginx restart
SCRIPT

$php = <<SCRIPT
apt-get update
apt-get install -y php-fpm php-mysql php-curl php-gd php-intl php-mbstring php-soap php-xml php-xmlrpc php-zip
mkdir /var/www/
systemctl restart php7.4-fpm
SCRIPT
 
$wordpress = <<SCRIPT
cd /var/www
git clone https://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@github.com/antoniols1/C2022-Examen-1er-trimestre wordpress
chown www-data. -R wordpress
cd wordpress
SCRIPT
 
$redisclient = <<SCRIPT
apt-get install -y redis-tools
SCRIPT


 
Vagrant.configure("2") do |config|
 
  config.vm.box = "ubuntu/focal64"
 
  config.vm.define :cache, primary: true do |cache|
    cache.vm.box = "ubuntu/focal64"
    cache.vm.box_check_update = true
    cache.vm.hostname = "ubuntu-cache"
    cache.vm.disk :disk, size: "100GB", primary: true
    cache.vm.network :private_network, ip: "10.10.10.1"
    cache.vm.network "forwarded_port", guest: 80, host: 80
    cache.vm.network "forwarded_port", guest: 1984, host: 1984
    cache.vm.network "forwarded_port", guest: 8080, host: 8080
    cache.vm.provision "file", source: "./haproxy.cfg", destination: "/tmp/haproxy.cfg"
    cache.vm.provision "shell", inline: $haproxy, privileged: true
    cache.vm.provision "file", source: "./default.vcl", destination: "/tmp/default.vcl"
    cache.vm.provision "shell", inline: $varnish, privileged: true
    
    cache.vm.provider "virtualbox" do |vb|
      vb.name = "ubuntu-cache-vb"
      vb.memory = "2048"
      vb.cpus = "1"
    end
  end   

  config.vm.define "bbdd" do |bbdd|
    bbdd.vm.box = "ubuntu/focal64"
    bbdd.vm.box_check_update = true
 
    bbdd.vm.hostname = "ubuntu-bbdd"
 
    bbdd.vm.disk :disk, size: "50GB", primary: true
    bbdd.vm.network :private_network, ip: "10.10.10.5"
    bbdd.vm.provision "shell", inline: $mysql, privileged: true
    bbdd.vm.provision "shell", inline: $redisserver, privileged: true
    bbdd.vm.provider "virtualbox" do |vb|
      vb.name = "ubuntu-bbdd-vb"
      vb.memory = "2048"
      vb.cpus = "1"
    end
  end

  config.vm.define "frontal" do |frontal|
    frontal.vm.box = "ubuntu/focal64"
    frontal.vm.box_check_update = true
 
    frontal.vm.hostname = "ubuntu-frontal"
 
    frontal.vm.disk :disk, size: "50GB", primary: true
    frontal.vm.network :private_network, ip: "10.10.10.3"

    frontal.vm.provision "file", source: "./ejemplo.conf", destination: "/tmp/ejemplo.conf"
    frontal.vm.provision "shell", inline: $nginx, privileged: true
    frontal.vm.provision "shell", inline: $php, privileged: true
    frontal.vm.provision "shell", inline: $wordpress, privileged: true
    frontal.vm.provision "shell", inline: $redisclient, privileged: true
    frontal.vm.provider "virtualbox" do |vb|
      vb.name = "ubuntu-frontal-vb"
      vb.memory = "2048"
      vb.cpus = "1"
    end
  end
end
