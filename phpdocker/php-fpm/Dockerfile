FROM phpdockerio/php73-fpm:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
	&& apt-get -y install build-essential \
    && apt-get -y --no-install-recommends install  php7.3-mysql php-xdebug php7.3-gd \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
	&& apt-get -y install php-sqlite3 \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN curl -O https://sqlite.org/2019/sqlite-autoconf-3280000.tar.gz \
	&& tar xvfz sqlite-autoconf-3280000.tar.gz \
	&& cd sqlite-autoconf-3280000/ \
	&& ./configure \
	&& make \
	&& make install


