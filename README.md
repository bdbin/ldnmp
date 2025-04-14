## What is LDNMP?

LDNMP (Linux Docker Nginx MySQL PHP) is a lightweight, minimalist, automated, and 100% open-source PHP integrated environment installation script. By default, it installs PHP versions with all available extensions, and each version is updated with the latest technology stack only. LDNMP supports a high level of customization, enabling developers to quickly build local PHP environments with transparent code, no bloat or redundant code, no junk data generation, and automatic deletion of installation packages upon successful setup—resulting in minimal disk space usage. Compared to control panels, it significantly reduces costs in terms of security, CPU, memory, and network resources.


## Deployment prerequisites

+   Before installation, make sure the system is clean and does not have any existing environments installed, such as Apache/Nginx/PHP/MySQL/MariaDB, to avoid potential port conflicts.
+   Please install Docker and Docker Compose manually:
    +   Docker installation: [https://docs.docker.com/engine/install/](https://docs.docker.com/engine/install/)
    +   Docker Compose installation: [https://docs.docker.com/compose/install/](https://docs.docker.com/compose/install/)

## Supported platforms
+   Supports major Linux distributions (based on Debian / RedHat), macOS, and includes domestic operating systems such as OpenKylin.

|  Platform   | x86_64 / amd64    | arm64 / aarch64  | 
| ----------- | ------- | -------------------- | 
| CentOS | ✓ | ✓ | 
| Debian | ✓ | ✓ | 
| Fedora | ✓ | ✓ | 
| RHEL   | ✓ | ✓ | 
| Ubuntu | ✓ | ✓ | 
| SUSE   | ✓ | ✓ | 
| macOS  | ✓ | ✓ | 
| Rocky Linux  | ✓ | ✓ | 
| Oracle Linux | ✓ | ✓ | 
| Alma Linux   | ✓ | ✓ | 
| openKylin    | ✓ | ✓ | 
| Binaries     | ✓ | ✓ | 
| openEuler    | ✓ | ✓ | 

> This does not mean that LDNMP only supports these distributions. Essentially, LDNMP should be able to run well on any certified Docker environment.

## LDNMP Supported Technology Stack

| Service    | Version   |
| ------- | ------ |
| Nginx   | 1.27.x |
| MySQL   | 9.2.x  |
| PHP     | 8.3.x｜8.4.x  |
| Adminer | latest |
| Redis   | 7.4.x  |

> The application version is updated to stay in sync with the official releases.

## Directory Structure

| Relative Directory| Description                   |
| ----------------- | ----------------------------- |
| ./apps/mysql/conf | MySQL configuration file directory         |
| ./apps/mysql/data | MySQL data storage directory             |
| ./apps/mysql/logs | MySQL logs directory             |
| ./apps/nginx      | Nginx configuration file directory             |
| ./apps/nginx/ssl  | Nginx SSL certificate storage directory             |
| ./apps/nginx/logs | Nginx logs directory             |
| ./web             | Website storage directory               |
| ./apps/php        | PHP configuration file directory             |
| ./apps/php/logs   | PHP-FPM logs directory        |
| ./apps/php/etc    | php.ini and php-fpm.conf configuration files |
| ./apps/redis/conf | Redis configuration file directory         |
| ./apps/redis/data | Redis data storage directory                 |

> Edit the docker-compose.yaml file in the installation directory.

## Installed and Supported PHP Extensions
|                     Extension                     | PHP 8.4 | PHP 8.3 |
| :-------------------------------------------------: | :-------: | :-------: |
|                       amqp                       |   ✓   |   ✓   |
|                       apcu                       |   ✓   |   ✓   |
|                      apcu_bc                      |        |        |
|                        ast                        |   ✓   |   ✓   |
|                      bcmath                      |   ✓   |   ✓   |
|                      bitset                      |   ✓   |   ✓   |
|                     blackfire                     |        |   ✓   |
|                      brotli                      |   ✓   |   ✓   |
|                        bz2                        |   ✓   |   ✓   |
|                     calendar                     |   ✓   |   ✓   |
| cassandra[*](#special-requirements-for-cassandra) |      |      |
|                       cmark                       |        |        |
|                        csv                        |   ✓   |   ✓   |
|                        dba                        |   ✓   |   ✓   |
|   ddtrace[*](#special-requirements-for-ddtrace)   |   ✓   |   ✓   |
|                      decimal                      |   ✓   |   ✓   |
|                        ds                        |   ✓   |   ✓   |
| ecma_intl[*](#special-requirements-for-ecma_intl) |        |   ✓   |
|                      enchant                      |   ✓   |   ✓   |
|                        ev                        |   ✓   |   ✓   |
|                       event                       |   ✓   |   ✓   |
|                      excimer                      |   ✓   |   ✓   |
|                       exif                       |   ✓   |   ✓   |
|                        ffi                        |   ✓   |   ✓   |
|                        ftp                        |   ✓   |   ✓   |
|                        gd                        |   ✓   |   ✓   |
|                      gearman                      |        |   ✓   |
|                       geoip                       |        |        |
|      geos[*](#special-requirements-for-geos)      |   ✓   |   ✓   |
|                    geospatial                    |   ✓   |   ✓   |
|                      gettext                      |   ✓   |   ✓   |
|                      gmagick                      |   ✓   |   ✓   |
|                        gmp                        |   ✓   |   ✓   |
|                       gnupg                       |   ✓   |   ✓   |
|                       grpc                       |   ✓   |   ✓   |
|                       http                       |   ✓   |   ✓   |
|                     igbinary                     |   ✓   |   ✓   |
|                      imagick                      |      |      |
|                       imap                       |   ✓   |   ✓   |
|                      inotify                      |   ✓   |   ✓   |
|                     interbase                     |        |        |
|                       intl                       |   ✓   |   ✓   |
|                        ion                        |   ✓   |   ✓   |
|                  ioncube_loader                  |        |   ✓   |
|                       jsmin                       |        |        |
|                     json_post                     |   ✓   |   ✓   |
|                     jsonpath                     |   ✓   |   ✓   |
|                       ldap                       |   ✓   |   ✓   |
|                    luasandbox                    |   ✓   |   ✓   |
|       lz4[*](#special-requirements-for-lz4)       |   ✓   |   ✓   |
|                        lzf                        |   ✓   |   ✓   |
|                     mailparse                     |   ✓   |   ✓   |
|                     maxminddb                     |   ✓   |   ✓   |
|                      mcrypt                      |        |   ✓   |
|                       md4c                       |   ✓   |   ✓   |
|                     memcache                     |   ✓   |   ✓   |
|                     memcached                     |   ✓   |   ✓   |
|   memprof[*](#special-requirements-for-memprof)   |   ✓   |   ✓   |
|                       mongo                       |        |        |
|                      mongodb                      |   ✓   |   ✓   |
|                     mosquitto                     |        |        |
|                      msgpack                      |   ✓   |   ✓   |
|                       mssql                       |        |        |
|                       mysql                       |        |        |
|                      mysqli                      |   ✓   |   ✓   |
|                     newrelic                     |        |   ✓   |
|                       oauth                       |   ✓   |   ✓   |
|                       oci8                       |   ✓   |   ✓   |
|                       odbc                       |   ✓   |   ✓   |
|                      opcache                      |   ✓   |   ✓   |
|                    opencensus                    |        |      |
|                    openswoole                    |        |      |
|                   opentelemetry                   |      |      |
|  parallel[*](#special-requirements-for-parallel)  |   ✓   |   ✓   |
|     parle[*](#special-requirements-for-parle)     |   ✓   |   ✓   |
|                       pcntl                       |   ✓   |   ✓   |
|                       pcov                       |   ✓   |   ✓   |
|                     pdo_dblib                     |   ✓   |   ✓   |
|                   pdo_firebird                   |   ✓   |   ✓   |
|                     pdo_mysql                     |   ✓   |   ✓   |
|                      pdo_oci                      |   ✓   |   ✓   |
|                     pdo_odbc                     |   ✓   |   ✓   |
|                     pdo_pgsql                     |   ✓   |   ✓   |
|                    pdo_sqlsrv                    |   ✓   |   ✓   |
|                       pgsql                       |   ✓   |   ✓   |
|                      phalcon                      |        |   ✓   |
|                     php_trie                     |   ✓   |   ✓   |
|      phpy[*](#special-requirements-for-phpy)      |   ✓   |   ✓   |
|                      pkcs11                      |   ✓   |   ✓   |
|                        pq                        |   ✓   |   ✓   |
|                      propro                      |        |        |
|                     protobuf                     |   ✓   |   ✓   |
|                      pspell                      |   ✓   |   ✓   |
|                        psr                        |   ✓   |   ✓   |
|  pthreads[*](#special-requirements-for-pthreads)  |        |        |
|                       raphf                       |   ✓   |   ✓   |
|                      rdkafka                      |   ✓   |   ✓   |
|                      recode                      |        |        |
|                       redis                       |   ✓   |   ✓   |
|                       relay                       |   ✓   |   ✓   |
|     saxon[*](#special-requirements-for-saxon)     |   ✓   |   ✓   |
|                     seasclick                     |   ✓   |   ✓   |
|                      seaslog                      |        |   ✓   |
|                       shmop                       |   ✓   |   ✓   |
|  simdjson[*](#special-requirements-for-simdjson)  |   ✓   |   ✓   |
|                     smbclient                     |   ✓   |   ✓   |
|                      snappy                      |   ✓   |   ✓   |
|                       snmp                       |   ✓   |   ✓   |
|                   snuffleupagus                   |   ✓   |   ✓   |
|                       soap                       |   ✓   |   ✓   |
|                      sockets                      |   ✓   |   ✓   |
|    sodium[*](#special-requirements-for-sodium)    |        |        |
|                       solr                       |        |   ✓   |
|                  sourceguardian                  |        |   ✓   |
|                        spx                        |   ✓   |   ✓   |
|    sqlsrv[*](#special-requirements-for-sqlsrv)    |   ✓   |   ✓   |
|                       ssh2                       |   ✓   |   ✓   |
|                       stomp                       |   ✓   |   ✓   |
|                      swoole                      |   ✓   |   ✓   |
|                     sybase_ct                     |        |        |
|                       sync                       |   ✓   |   ✓   |
|                      sysvmsg                      |   ✓   |   ✓   |
|                      sysvsem                      |   ✓   |   ✓   |
|                      sysvshm                      |   ✓   |   ✓   |
|                      tensor                      |        |        |
|                     tideways                     |   ✓   |   ✓   |
|                       tidy                       |   ✓   |   ✓   |
|                    timezonedb                    |   ✓   |   ✓   |
|                       uopz                       |        |   ✓   |
|                  uploadprogress                  |   ✓   |   ✓   |
|                       uuid                       |   ✓   |   ✓   |
|                        uv                        |   ✓   |   ✓   |
|      vips[*](#special-requirements-for-vips)      |   ✓   |   ✓   |
|                        vld                        |        |   ✓   |
|                       wddx                       |        |        |
| wikidiff2[*](#special-requirements-for-wikidiff2) |   ✓   |   ✓   |
|                      xdebug                      |   ✓   |   ✓   |
|                       xdiff                       |   ✓   |   ✓   |
|                      xhprof                      |   ✓   |   ✓   |
|                     xlswriter                     |   ✓   |   ✓   |
|                      xmldiff                      |   ✓   |   ✓   |
|                      xmlrpc                      |   ✓   |   ✓   |
|     xpass[*](#special-requirements-for-xpass)     |   ✓   |   ✓   |
|                        xsl                        |   ✓   |   ✓   |
|                        yac                        |   ✓   |   ✓   |
|                       yaml                       |   ✓   |   ✓   |
|                        yar                        |   ✓   |   ✓   |
|                   zephir_parser                   |   ✓   |   ✓   |
|                        zip                        |   ✓   |   ✓   |
|                        zmq                        |   ✓   |   ✓   |
|                     zookeeper                     |        |        |
|                       zstd                       |   ✓   |   ✓   |


> This extension is from https://github.com/mlocati/docker-php-extension-installer, see the example file for reference

PS: the pre-installed PHP extensions are excluded from this list.
You can list them with the following command (change `php:8.4.2-fpm-alpine` to reflect the PHP version you are interested in):

```
$ docker run --rm php:8.4.2-fpm-alpine  php -m
[PHP Modules]
Core
ctype
curl
date
dom
fileinfo
filter
hash
iconv
json
libxml
mbstring
mysqlnd
openssl
pcre
PDO
pdo_sqlite
Phar
posix
random
readline
Reflection
session
SimpleXML
sodium
SPL
sqlite3
standard
tokenizer
xml
xmlreader
xmlwriter
zlib

[Zend Modules]
```

## Quick Start
Startup process: Pull the code - Pull the image - Start the service. The PHP image is based on the official PHP image and comes with all PHP extensions pre-installed, so there is no need to install PHP extensions. It’s ready to use out of the box.

1. Clone the project
``` bash
git clone https://github.com/bdbin/ldnmp.git
```
or
```bash
wget https://github.com/bdbin/ldnmp/archive/refs/heads/main.zip
unzip main.zip
```

2. Set Directory Permissions
```bash
chmod -R 777 ldnmp*
```
```bash
chmod 644 ldnmp*/apps/mysql/conf/my.cnf
```

3. Start the service
```bash
docker-compose up -d
```

or

```bash
docker compose up -d
```

4. After installation is complete, visit http://localhost:8084 or https://localhost:8085 (self-signed HTTPS) in your browser to see the result. The PHP code is located in the file ./web/index.php.

5. You can access Adminer to manage the MySQL database at http://localhost:8086.

6.  After installation is complete, execute the following command to view the MySQL password. The default username is: root.
```bash
cat docker-compose.yaml | grep MYSQL_ROOT_PASSWORD
```

7.  After installation is complete, execute the following command to view the Redis password. There is no default username.
   
```bash
cat ldnmp*/apps/redis/conf/redis.conf | grep requirepass
```

## Custom Installation
1. By default, all services listed in docker-compose.yaml will be installed automatically, including: Nginx, MySQL, PHP, Adminer, and Redis.
2. To install only Nginx.
```bash
docker-compose up -d nginx
```
3. To install only PHP.
```bash
docker-compose up -d php
```
4. To install only MySQL.
```bash
docker-compose up -d mysql
```
5. To install only Redis.
```bash
docker-compose up -d redis
```
6. To install Nginx, MySQL, PHP, Adminer
```bash
docker-compose up -d nginx mysql php adminer
```

# Adding support to a new PHP extension
1. You can edit the docker-compose.yaml file as needed. Locate the PHP_EXTENSIONS field — by default, it includes all available PHP extensions. You can remove or add extensions based on your needs, using the ones supported by https://github.com/mlocati/docker-php-extension-installer. Multiple extensions should be separated by spaces.
2. Start Building
```bash
docker-compose build
```
or
```bash
docker compose build
```
3. Start the service
```bash
docker-compose up -d
```
or
```bash
docker compose up -d
```

## Manage services

Restart Nginx
   
```bash
docker restart nginx
```

Restart MySQL

```bash
docker restart mysql
```

Restart PHP

```bash
docker restart php
```

Restart Adminer

```bash
docker restart adminer
```

Restart Redis

```bash
docker restart redis
```

> Optional Parameters: docker <stop|start|restart> servicename

## Default Port

| Service     | Exposed Ports of the Container                 | Default Port |
| ------- | -------------------------- | -------- |
| Nginx   | 8084（http）/ 8085（https） | 80/443   |
| PHP     | 9000                       | 9000     |
| MySQL   | 3307                       | 3306     |
| Adminer | 8086                       | 8080     |
| Redis   | 6379                       | 6379     |

> You can edit the docker-compose.yaml file to modify the ports for the corresponding services.

## Uninstall

1.  Stop All Services
    ```bash
    docker-compose down
    ```
	
2.  Delete All Service Data
    ```bash
    rm -rf apps docker-compose.yaml web
    ```
	
3.  Delete Docker Image
    ```bash
    docker rmi $(docker images | grep 'php|nginx|mysql|redis' | awk '{print $3}')
    ```

> Uninstalling and deleting means all data will be permanently lost and irreversible. Proceed with caution.
