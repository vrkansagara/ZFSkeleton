ZFSkeleton by vrkansagara
=======================
[![Build Status](https://travis-ci.org/vrkansagara/ZFSkeleton.svg?branch=master)](https://travis-ci.org/vrkansagara/ZFSkeleton)
[![Coverage Status](https://coveralls.io/repos/vrkansagara/ZFSkeleton/badge.svg?branch=master&service=github)](https://coveralls.io/github/vrkansagara/ZFSkeleton?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/560bd4ab5a262f001e0007f4/badge.svg?style=flat)](https://www.versioneye.com/user/projects/560bd4ab5a262f001e0007f4)

[![Latest Stable Version](https://poser.pugx.org/vrkansagara/zfskeleton/v/stable)](https://packagist.org/packages/vrkansagara/zfskeleton)
[![Total Downloads](https://poser.pugx.org/vrkansagara/zfskeleton/downloads)](https://packagist.org/packages/vrkansagara/zfskeleton)
[![License](https://poser.pugx.org/vrkansagara/zfskeleton/license)](https://packagist.org/packages/vrkansagara/zfskeleton)



Introduction
------------
This is a simple, skeleton application based on the Zend Framework MVC layer and module
systems. This application is meant to be used as a starting place for those
looking to get their feet wet with ZF2.

Installation using Composer
---------------------------

The easiest way to create a new ZF2 project is to use [Composer](https://getcomposer.org/). If you don't have it already installed, then please install as per the [documentation](https://getcomposer.org/doc/00-intro.md).


Create your new ZF2 project:
```console
    $ composer create-project -n -sstable vrkansagara/ZFSkeleton path/to/install
```
OR you can use 
```console
    $ composer require zendframework/zendframework
```

### Installation using a tarball with a local Composer

If you don't have composer installed globally then another way to create a new ZF2 project is to download the tarball and install it:

1. Download the [tarball](https://github.com/vrkansagara/ZFSkeleton/tarball/master), extract it and then install the dependencies with a locally installed Composer:

        cd my/project/dir
        curl -#L https://github.com/vrkansagara/ZFSkeleton/tarball/master| tar xz --strip-components=1
    

2. Download composer into your project directory and install the dependencies:

        curl -s https://getcomposer.org/installer | php
        php composer.phar install
        
If you don't have access to curl, then install Composer into your project as per the [documentation](https://getcomposer.org/doc/00-intro.md).
   

### PHP CLI server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root
directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note:** The built-in CLI server is *for development only*.

### Vagrant server

This project supports a basic [Vagrant](http://docs.vagrantup.com/v2/getting-started/index.html) configuration with an inline shell provisioner to run the Skeleton Application in a [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

1. Run vagrant up command

    vagrant up

2. Visit [http://localhost:8085](http://localhost:8085) in your browser

Look in [Vagrantfile](Vagrantfile) for configuration details.

### Apache setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:
```console
    <VirtualHost *:80>
        ServerName ZFSkeleton.localhost
        DocumentRoot /path/to/ZFSkeleton/public
        <Directory /path/to/ZFSkeleton/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
            <IfModule mod_authz_core.c>
            Require all granted
            </IfModule>
        </Directory>
    </VirtualHost>
```
### Nginx setup

To setup nginx, open your `/path/to/nginx/nginx.conf` and add an
[include directive](http://nginx.org/en/docs/ngx_core_module.html#include) below
into `http` block if it does not already exist:

    http {
        # ...
        include sites-enabled/*.conf;
    }


Create a virtual host configuration file for your project under `/path/to/nginx/sites-enabled/ZFSkeleton.localhost.conf`
it should look something like below:

    server {
        listen       80;
        server_name  ZFSkeleton.localhost;
        root         /path/to/ZFSkeleton/public;

        location / {
            index index.php;
            try_files $uri $uri/ @php;
        }

        location @php {
            # Pass the PHP requests to FastCGI server (php-fpm) on 127.0.0.1:9000
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_param  SCRIPT_FILENAME /path/to/ZFSkeleton/public/index.php;
            include fastcgi_params;
        }
    }

Restart the nginx, now you should be ready to go!


- File issues at https://github.com/vrkansagara/ZFSkeleton/issues
- Documentation is at https://github.com/vrkansagara/ZFSkeleton/wiki
