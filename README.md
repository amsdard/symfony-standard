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
yake configure-docker
yake up
```


Install by `git` only
---
```
git clone git@github.com:amsdard/symfony-standard.git project-name
# cd to project directory
yake composer install
yake configure-docker
yake up
```

TODO:
---
- asset bundle

First project install
---
* directory name `project-name` will become Your domain name: `project-name.app` and Your container's image tag namespace
* remove YAKE `configure-docker` task
* update `composer.json` by Your project name, description
* if You want to use local composer (based on PHP image):
```
curl -fsSL 'https://getcomposer.org/composer.phar' -o ./composer.phar
```
and replace YAKE *composer* task by:
```
composer: $BIN php ./composer.phar --optimize-autoloader $CMD
```

Settings
---
* edit `./docker/*/config.env` files
* do not use `require-dev` in composer.json (keep common vendors)
* `yake console assetic:dump --env=prod --no-debug` before deploy
* `yake console assetic:watch` to work with assets locally

Run (dev / rancher)
---
```
yake push php
yake push nginx
```
* import `./deploy/rancher/docker-compose.yml` into Rancher + complete ENVs
* make sure `mysql` works on specific host (Scheduling)
* make sure `nginx` has *Health Check* enabled