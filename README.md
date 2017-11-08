Symfony Standard Edition - AS docker edition
========================

See [DOCS](https://symfony.com/doc/current/index.html) for more details.


Requirements
---
 * configure Your local [projects enrironment](https://bitbucket.org/as-docker/projects-environment)
 * install composer globally [global composer command](https://hub.docker.com/r/amsdard/composer/)
 * make sure You have [YAKE](https://yake.amsdard.io/) installed


Install by global `composer`
---
```
composer create-project amsdard/symfony-standard project-name
# cd to project directory
yake up
```


Install by `git` only
---
```
git clone git@github.com:amsdard/symfony-standard.git project-name
# cd to project directory
yake configure    # optionally `yake PROJECTNAME=other-name configure`
yake up
yake composer install
```


Settings
---
* edit `./docker/*/config.env` files
* directory name `project-name` will become Your domain name: `project-name.app` and Your container's image tag namespace


Run (dev / rancher)
---
```
yake push php
yake push nginx
```
* import `docker-compose-rancher.yml` into Rancher
* make sure `mysql` works on specific host (Scheduling)
* make sure `nginx` has *Health Check* enabled