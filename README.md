

LDNMP（Linux Docker Nginx MySQL PHP）是一个轻量、极简化、自动化且100%开源的PHP集成环境安装脚本, 默认安装的PHP版本包含当前PHP所有扩展, 每个版本只更新最新的技术栈。LDNMP支持高度定制化, 方便开发者快速构建本地的PHP环境、且代码透明、无臃肿冗余代码、无垃圾数据产出、安装成功后自动删除对应软件包, 极少的占用磁盘空间。相对于控制面板，在安全性、CPU、内存、网络等资源上大大节流开支。


## 先决条件

+   安装前先确保系统是干净的, 没有安装过任何环境, 如: Apache/Nginx/PHP/MySQL/MariaDB, 否则会存在端口冲突。
+   请自行安装 docke 及 docker-compose:
    +   docker 安装方法: [https://docs.docker.com/engine/install/](https://docs.docker.com/engine/install/)
    +   docker-compose 安装方法: [https://docs.docker.com/compose/install/](https://docs.docker.com/compose/install/)

## 支持的操作系统
+   支持主流 Linux 发行版本（基于 Debian / RedHat macOS 包括 OpenKylin 等国产操作系统）

| 操作系统    | 架构    | 软件要求             | 
| ----------- | ------- | -------------------- | 
| linux/amd64 | x86\_64 | docker docker-compose | 
| linux/arm64 | aarch64 | docker docker-compose | 

## LDNMP 支持的技术栈

| 服务    | 版本   |
| ------- | ------ |
| Nginx   | 1.27.x |
| MySQL   | 9.0.x  |
| PHP     | 8.3.x｜8.4.x  |
| Adminer | latest |
| Redis   | 7.4.x  |

> 应用版本更新与官方保持同步。

## 目录结构

| 相对目录          | 描述                          |
| ----------------- | ----------------------------- |
| ./apps/mysql/conf | MySQL配置文件所在路径         |
| ./apps/mysql/data | MySQL数据存放目录             |
| ./apps/mysql/logs | MySQL日志存放路径             |
| ./apps/nginx      | Nginx配置文件目录             |
| ./apps/nginx/ssl  | Nginx证书存放目录             |
| ./apps/nginx/logs | Nginx日志存放目录             |
| ./web             | 网站存放目录                  |
| ./apps/php        | PHP配置文件目录               |
| ./apps/php/logs   | PHP-FPM日志目录               |
| ./apps/php/etc    | php.ini php-fpm.conf 配置目录 |
| ./apps/redis/conf | Redis 配置文件所在目录         |
| ./apps/redis/data | 数据存储目录                   |

> 安装相对目录可编辑 `docker-compose.yaml` 修改


## 已安装并支持的PHP扩展
| **Extension**        | **PHP 8.3** |
|----------------------|-------------|
| amqp                 | ✓           |
| apcu                 | ✓           |
| ast                  | ✓           |
| bcmath               | ✓           |
| bitset               | ✓           |
| blackfire            | ✓           |
| bz2                  | ✓           |
| calendar             | ✓           |
| Core                 | ✓           |
| csv                  | ✓           |
| ctype                | ✓           |
| curl                 | ✓           |
| date                 | ✓           |
| dba                  | ✓           |
| ddtrace              | ✓           |
| decimal              | ✓           |
| dom                  | ✓           |
| ds                   | ✓           |
| enchant              | ✓           |
| ev                   | ✓           |
| event                | ✓           |
| excimer              | ✓           |
| exif                 | ✓           |
| FFI                  | ✓           |
| fileinfo             | ✓           |
| filter               | ✓           |
| ftp                  | ✓           |
| gd                   | ✓           |
| gearman              | ✓           |
| geos                 | ✓           |
| geospatial           | ✓           |
| gettext              | ✓           |
| gmagick              | ✓           |
| gmp                  | ✓           |
| gnupg                | ✓           |
| grpc                 | ✓           |
| hash                 | ✓           |
| http                 | ✓           |
| iconv                | ✓           |
| igbinary             | ✓           |
| imap                 | ✓           |
| inotify              | ✓           |
| intl                 | ✓           |
| ion                  | ✓           |
| json                 | ✓           |
| json_post            | ✓           |
| jsonpath             | ✓           |
| ldap                 | ✓           |
| libsmbclient         | ✓           |
| libxml               | ✓           |
| luasandbox           | ✓           |
| lzf                  | ✓           |
| mailparse            | ✓           |
| maxminddb            | ✓           |
| mbstring             | ✓           |
| mcrypt               | ✓           |
| memcache             | ✓           |
| memcached            | ✓           |
| mongodb              | ✓           |
| msgpack              | ✓           |
| mysqli               | ✓           |
| mysqlnd              | ✓           |
| newrelic             | ✓           |
| OAuth                | ✓           |
| oci8                 | ✓           |
| odbc                 | ✓           |
| openssl              | ✓           |
| parle                | ✓           |
| pcntl                | ✓           |
| pcov                 | ✓           |
| pcre                 | ✓           |
| PDO                  | ✓           |
| pdo_dblib            | ✓           |
| PDO_Firebird         | ✓           |
| pdo_mysql            | ✓           |
| PDO_OCI              | ✓           |
| PDO_ODBC             | ✓           |
| pdo_pgsql            | ✓           |
| pdo_sqlite           | ✓           |
| pdo_sqlsrv           | ✓           |
| pgsql                | ✓           |
| Phar                 | ✓           |
| php_trie             | ✓           |
| phpy                 | ✓           |
| pkcs11               | ✓           |
| posix                | ✓           |
| pq                   | ✓           |
| protobuf             | ✓           |
| pspell               | ✓           |
| random               | ✓           |
| raphf                | ✓           |
| rdkafka              | ✓           |
| readline             | ✓           |
| redis                | ✓           |
| Reflection           | ✓           |
| relay                | ✓           |
| SeasClick            | ✓           |
| SeasLog              | ✓           |
| session              | ✓           |
| shmop                | ✓           |
| SimpleXML            | ✓           |
| smbclient            | ✓           |
| snappy               | ✓           |
| snmp                 | ✓           |
| snuffleupagus        | ✓           |
| soap                 | ✓           |
| sockets              | ✓           |
| sodium               | ✓           |
| solr                 | ✓           |
| SourceGuardian       | ✓           |
| SPL                  | ✓           |
| SPX                  | ✓           |
| sqlite3              | ✓           |
| ssh2                 | ✓           |
| standard             | ✓           |
| Stomp                | ✓           |
| swoole               | ✓           |
| sync                 | ✓           |
| sysvmsg              | ✓           |
| sysvsem              | ✓           |
| sysvshm              | ✓           |
| tideways             | ✓           |
| tidy                 | ✓           |
| timezonedb           | ✓           |
| tokenizer            | ✓           |
| uploadprogress       | ✓           |
| uuid                 | ✓           |
| uv                   | ✓           |
| vld                  | ✓           |
| xdebug               | ✓           |
| xdiff                | ✓           |
| xhprof               | ✓           |
| xlswriter            | ✓           |
| xml                  | ✓           |
| xmldiff              | ✓           |
| xmlreader            | ✓           |
| xmlrpc               | ✓           |
| xmlwriter            | ✓           |
| xsl                  | ✓           |
| yac                  | ✓           |
| yaml                 | ✓           |
| yar                  | ✓           |
| Zend OPcache         | ✓           |
| zephir_parser        | ✓           |
| zip                  | ✓           |
| zlib                 | ✓           |
| zmq                  | ✓           |
| zstd                 | ✓           |

> 此扩展来自 https://github.com/mlocati/docker-php-extension-installer 参考示例文件

## 快速开始
启动过程: 拉取代码 - 拉取镜像 - 启动服务, 其中 PHP 镜像是基于官方 PHP 镜像默认安装了所有 PHP 扩展, 因此无需再安装 PHP 扩展, 开箱即用。

1. clone项目
``` bash
git clone https://github.com/bdbin/ldnmp.git
```
或
```bash
wget https://github.com/bdbin/ldnmp/archive/refs/heads/main.zip
unzip main.zip
```

2. 设置目录权限
```bash
chmod -R 777 ldnmp*
```
```bash
chmod 644 ldnmp*/apps/mysql/conf/my.cnf
```

3. 进入项目目录, 执行以下命令启动服务
```bash
docker-compose up -d
```

或

```bash
docker compose up -d
```

4. 安装完成后，在浏览器中访问：http://localhost:8084 或 https://localhost:8085 (自签名HTTPS) 就能看到安装后的效果, PHP代码在文件./web/index.php

5. 可访问 http://localhost:8086 访问 Adminer 管理 MySQL 数据库

6.  安装完成后，执行如下命令可查看 MySQL 密码，账号默认：root  
   
```bash
cat docker-compose.yaml | grep MYSQL_ROOT_PASSWORD
```

7.  安装完成后，执行如下命令可查看 Redis 密码，账号默认：无
   
```bash
cat ldnmp*/apps/redis/conf/redis.conf | grep requirepass
```

## 自定义安装
1. 默认会自动安装 `docker-compose.yaml` 中所有的服务, 即: Nginx, MySQL, PHP, Adminer、Redis
2. 只安装 Nginx
```bash
docker-compose up -d nginx
```
3. 只安装 PHP
```bash
docker-compose up -d php
```
4. 只安装 MySQL
```bash
docker-compose up -d mysql
```
5. 只安装 Redis
```bash
docker-compose up -d redis
```
6. 只安装 Nginx, MySQL, PHP, Adminer
```bash
docker-compose up -d nginx mysql php adminer
```

# PHP 扩展
1. 可根据需要编辑  `docker-compose.yaml`  找到 `PHP_EXTENSIONS` 默认是所有的 PHP 扩展, 根据需要删除或增加 `https://github.com/mlocati/docker-php-extension-installer` 中支持的 PHP 扩展, 多个扩展以空格分隔
2. 编辑完成后, 执行如下命令开始构建
```bash
docker-compose build
```
或
```bash
docker compose build
```
3. 执行如下命令启动构建后的服务
```bash
docker-compose up -d
```
或
```bash
docker compose up -d
```

## 管理

重启 Nginx
   
```bash
docker restart nginx
```

重启 MySQL

```bash
docker restart mysql
```

重启 PHP

```bash
docker restart php
```

重启 Adminer

```bash
docker restart adminer
```

重启 Redis

```bash
docker restart redis
```

> 可选参数: docker <stop|start|restart> servicename

## 默认端口

| 服务     | 容器暴露端口                 | 默认端口 |
| ------- | -------------------------- | -------- |
| Nginx   | 8084（http）/ 8085（https） | 80/443   |
| PHP     | 9000                       | 9000     |
| MySQL   | 3307                       | 3306     |
| Adminer | 8086                       | 8080     |
| Redis   | 6379                       | 6379     |

> 可编辑 `docker-compose.yaml` 修改对应服务的端口

## 卸载

1.  找到 docker-compose.yaml 文件所在目录，执行如下命令停止服务  
    ```bash
    docker-compose down
    ```
	
2.  在终端执行如下命令可删除所有数据  
    ```bash
    rm -rf apps docker-compose.yaml web
    ```
	
3.  在终端执行如下命令删除 Docker 镜像  
    ```bash
    docker rmi $(docker images | grep 'php|nginx|mysql|redis' | awk '{print $3}')
    ```

> 卸载删除意味着所有数据将不复存在且不可逆, 请先备份。卸载删除意味着所有数据将不复存在且不可逆, 请先备份。
