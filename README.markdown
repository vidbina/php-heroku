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
