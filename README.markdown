# Server
For development purposes one may just use the [built-in web server](http://www.php.net/manual/en/features.commandline.webserver.php) 
that comes bundled with PHP since version 5.4.0.

```bash
php -S localhost:8989
```

It's up to you to determine which port to use, as long as it's not being used
by another application.

# Database
Setup MySQL on Heroku by setting up the ClearDB addon.
The free plan is the ignite plan :wink:

```heroku addons:add cleardb:ignite```

# Submodules
Git submodules are used to pull in codebases for projects that have no
composer packages.

Upon cloning this repository it will be necessary to pull the code of the
used submodules by using initializing and updating the submodules.

```bash
git submodule init
git submodule update
```

If the repository has already been cloned in the past and the submodules have
already been initialized, one may consider running a update after every pull.

```bash
git submodule update
```

This may be necessary as pulls only update the repository's codebase but not
the codebases of its submodules. More information on submodules may be found
[online](http://git-scm.com/book/en/Git-Tools-Submodules).

## Opencart
Opencart requires a few PHP extensions (amongst which GD and mCrypt) to 
work. When writing the documentation brew was used to install libpng and 
libjpeg which explains the ```/usr/local/Cellar/``` paths. You can install PHP 
for Opencart by running the following command, replacing the paths to libpng
and libjpeq for whatever is applicable on your system.
```bash
phpbrew install php-5.5.12 +default +dbs +mcrypt +gd -- --with-gd=shared --enable-gd-natf --with-jpeg-dir=/usr/local/Cellar/libjpeg --with-png-dir=/usr/local/Cellar/libpng
```

Opencart uses a two ```config.php``` files to store paths and credentials. As 
it is not really a smart idea to store this information in the repository you
may use environment variables to store sensitive information. When running the
development server *please make sure to load the environment variables first*.

The gist below contains a makefile that will aid in loading the the environment
variables by running ```make env``` (this will select the proper PHP version and
set the needed environment variables).

In order for the codebase to work on Heroku you will need to set the 
[environment variables there](https://devcenter.heroku.com/articles/config-vars) as well.
Using ```make conf``` on the makefile below will set the needed environment 
variables on heroku as well.

<script src="https://gist.github.com/vidbina/3ba958e91a1f0428b16d.js"></script>

The environment variables are:
 - ```DATABASE_URL``` the URL of the database we are using. In case you have enabled the ClearDB addon, you may find its URL in the ```CLEARDB_DATABASE_URL``` environment variable.
 - ```HOST``` the hostname of the OpenCart application (on Heroku the host will be ```appname.herokuapp.com``` while on a host you will most likely have ```localhost:PORT``` as the hostname)
 - ```BASE``` the location to the directory containing the public folder for the project (on your local mech this will be the path to this repository while on Heroku it will most likely be the /app directory)

Run ```heroku run pwd``` to determine which directory is used as your 
application's base directory.
