Symfony Standard Edition - AS docker edition
========================

See [DOCS](https://symfony.com/doc/current/index.html) for more details.


Requirements
---
Add *composer* alias-command to Your `~/.bashrc` or `~/.zshrc`:
```
alias composer='docker run --rm -it -v $(pwd):/opt -e"COMPOSER_ALLOW_SUPERUSER=1" amsdard/composer composer --ignore-platform-reqs --working-dir=/opt'
```

* make sure You have [YAKE](https://yake.amsdard.io/) installed
* run globally (once): [traefik](https://traefik.io/)
* create network (once) `docker network create global`
* make sure You have *Rancher CLI* installed and configured as `rancher`

Install
---
```
composer create-project --no-scripts amsdard/symfony-standard my_project_name
```

Run (local)
---
```
# cd to project directory
yake configure
yake up    
yake composer install
```

Run (dev / rancher)
---
```
yake push php
yake push nginx
```
* import `docker-compose-rancher.yml` into Rancher
* make sure `mysql` works on specific host (Scheduling)
* make sure `nginx` has *Health Check* enabled