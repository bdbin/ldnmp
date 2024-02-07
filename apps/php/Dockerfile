# use php version
ARG PHP_VERSION
FROM "${PHP_VERSION}"

# download install-php-extensions script
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

# Replace /etc/apk/repositories configuration
ARG TZ
ARG MIRRORS_REPO_URL
RUN set -x; \
    [ -n "${MIRRORS_REPO_URL}" ] && sed -i "s@dl-cdn.alpinelinux.org@${MIRRORS_REPO_URL}@g" /etc/apk/repositories \
    && apk update \
    && apk --no-cache add tzdata \
    && cp "/usr/share/zoneinfo/$TZ" /etc/localtime \
    && echo "$TZ" > /etc/timezone

# install php extensions
ARG PHP_EXTENSIONS
RUN set -x; for i in "${PHP_EXTENSIONS}"; do install-php-extensions "${i}"; done
