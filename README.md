

LDNMP（Linux Docker Nginx MySQL PHP）是一个轻量化、极简化、自动化且100%开源的PHP集成环境安装脚本，以安装最新技术栈版本为基础，每个版本只更新最新的技术栈。LDNMP支持高度定制化，且代码透明、无臃肿冗余代码、无垃圾数据产出、安装成功后自动删除对应软件包，极少的占用磁盘空间。相对于控制面板，在安全性、CPU、内存、网络等资源上大大节流开支。

## 先决条件

+   安装前先确保系统是干净的，没有安装过任何环境，如：Apache/Nginx/PHP/MySQL/MariaDB，否则会存在端口冲突。
+   请自定安装 docker、docker-compose:
    +   docker 安装方法: [https://docs.docker.com/engine/install/](https://docs.docker.com/engine/install/)
    +   docker-compose 安装方法: [https://docs.docker.com/compose/install/](https://docs.docker.com/compose/install/)

## 支持的操作系统

+   支持主流 Linux 发行版本（基于 Debian / RedHat / macOS，包括国产操作系统）

| 操作系统 | 架构 | 建议 Linux 内核 | 软件要求 | 建议最小化硬件配置 |
| --- | --- | --- | --- | --- |
| linux/amd64 | x86\_64 | \>= 4.0 | wget curl tar Docker | 1Core/1GB RAM/30G HDD |
| linux/arm64 | aarch64 | \>= 4.0 | wget curl tar Docker | 1Core/1GB RAM/30G HDD |

## LDNMP 支持的技术栈

| 服务 | 版本 |
| --- | --- |
| Nginx | 1.25.3 |
| MySQL | 8.0.36 |
| PHP | 8.3.2 |
| Adminer | latest |

> 应用版本更新与官方保持同步。

## 已安装并支持的PHP扩展

| Extension | PHP 8.3 |
| --- | --- |
| amqp | ✓ |
| apcu | ✓ |
| ast | ✓ |
| bcmath | ✓ |
| bitset | ✓ |
| blackfire | ✓ |
| bz2 | ✓ |
| calendar | ✓ |
| csv | ✓ |
| dba | ✓ |
| decimal | ✓ |
| ds | ✓ |
| enchant | ✓ |
| ev | ✓ |
| event | ✓ |
| excimer | ✓ |
| exif | ✓ |
| ffi | ✓ |
| ftp | ✓ |
| gd | ✓ |
| geospatial | ✓ |
| gettext | ✓ |
| gmagick | ✓ |
| gmp | ✓ |
| gnupg | ✓ |
| http | ✓ |
| igbinary | ✓ |
| imap | ✓ |
| inotify | ✓ |
| intl | ✓ |
| ion | ✓ |
| json\_post | ✓ |
| jsonpath | ✓ |
| ldap | ✓ |
| luasandbox | ✓ |
| lzf | ✓ |
| mailparse | ✓ |
| maxminddb | ✓ |
| mcrypt | ✓ |
| memcache | ✓ |
| memcached | ✓ |
| mongodb | ✓ |
| msgpack | ✓ |
| mysqli | ✓ |
| oauth | ✓ |
| oci8 | ✓ |
| odbc | ✓ |
| opcache | ✓ |
| openswoole | ✓ |
| opentelemetry | ✓ |
| pcntl | ✓ |
| pcov | ✓ |
| pdo\_dblib | ✓ |
| pdo\_firebird | ✓ |
| pdo\_mysql | ✓ |
| pdo\_oci | ✓ |
| pdo\_odbc | ✓ |
| pdo\_pgsql | ✓ |
| pgsql | ✓ |
| php\_trie | ✓ |
| pkcs11 | ✓ |
| pq | ✓ |
| protobuf | ✓ |
| pspell | ✓ |
| raphf | ✓ |
| rdkafka | ✓ |
| redis | ✓ |
| relay | ✓ |
| seasclick | ✓ |
| seaslog | ✓ |
| shmop | ✓ |
| smbclient | ✓ |
| snappy | ✓ |
| snmp | ✓ |
| snuffleupagus | ✓ |
| soap | ✓ |
| sockets | ✓ |
| solr | ✓ |
| spx | ✓ |
| ssh2 | ✓ |
| stomp | ✓ |
| sync | ✓ |
| sysvmsg | ✓ |
| sysvsem | ✓ |
| sysvshm | ✓ |
| tideways | ✓ |
| tidy | ✓ |
| timezonedb | ✓ |
| uopz | ✓ |
| uploadprogress | ✓ |
| uuid | ✓ |
| uv | ✓ |
| vld | ✓ |
| xdebug | ✓ |
| xdiff | ✓ |
| xhprof | ✓ |
| xlswriter | ✓ |
| xmldiff | ✓ |
| xmlrpc | ✓ |
| xsl | ✓ |
| yac | ✓ |
| yaml | ✓ |
| zephir\_parser | ✓ |
| zip | ✓ |
| zmq | ✓ |
| zstd | ✓ |

> 此扩展来自https://github.com/mlocati/docker-php-extension-installer 参考示例文件

## 安装
1. clone项目
`$ git clone https://github.com/bdbin/ldnmp.git`

2. 进入项目目录，执行以下命令启动服务
`$ docker-compose up`

3. 安装完成后，在浏览器中访问：http://localhost:8084 或 https://localhost:8085 (自签名HTTPS) 就能看到安装后的效果，PHP代码在文件./web/index.php

4. 可访问 http://localhost:8086 访问 Adminer 管理 MySQL 数据库

5.  安装完成后，执行如下命令可查看 MySQL 密码，账号默认：root  
    `cat docker-compose.yaml | grep MYSQL_ROOT_PASSWORD`

## 管理

1. 重启 Nginx
`docker restart $(docker ps -a | grep renwole-nginx | awk '{print $1}')`

2. 重启 MySQL
`docker restart $(docker ps -a | grep renwole-mysql | awk '{print $1}')`

3. 重启 PHP
`docker restart $(docker ps -a | grep renwole-php | awk '{print $1}')`

4. 重启 Adminer
`docker restart $(docker ps -a | grep renwole-adminer | awk '{print $1}')`

## 默认端口

| 服务 | 容器暴露端口 | 默认端口 |
| --- | --- | --- |
| Nginx | 8084（http）/8085（https） | 80/443 |
| PHP | 9000 | 9000 |
| MySQL | 3307 | 3306 |
| Adminer | 8085 | 8080 |

> 可编辑 `docker-compose.yaml` 修改对应服务的端口

## 目录结构

| 相对目录 | 描述 |
| --- | --- |
| ./apps/mysql/conf | MySQL配置文件所在路径 |
| ./apps/mysql/data | MySQL数据存放目录 |
| ./apps/mysql/logs | MySQL日志存放路径 |
| ./apps/nginx | Nginx配置文件目录 |
| ./apps/nginx/ssl | Nginx证书存放目录 |
| ./apps/nginx/logs | Nginx日志存放目录 |
| ./web | 网站存放目录 |
| ./apps/php | PHP配置文件目录 |
| ./apps/php/logs | PHP-FPM日志目录 |
| ./apps/php/etc | php.ini php-fpm.conf 配置目录 |

> 安装相对目录可编辑 `docker-compose.yaml` 修改

## 卸载

1.  找到 docker-compose.yaml 文件所在目录，执行如下命令停止服务  
    `docker-compose down`
	
2.  在终端执行如下命令可删除所有数据  
    `rm -rf apps docker-compose.yaml web`
	
3.  在终端执行如下命令删除 Docker 镜像  
    `docker rmi $(docker images | grep 'php|nginx|mysql' | awk '{print $3}')`

## 说明

> 卸载删除意味着所有数据将不复存在且不可逆，请先备份。卸载删除意味着所有数据将不复存在且不可逆，请先备份。