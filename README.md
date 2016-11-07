Docker Project Guide
================
Migrations
---
```sh
docker-compose run --rm web ./yii migrate
```
Set directory permissions
---
```
docker-compose run --rm web chown www-data web/assets runtime
```
Update composer 
---
```sh
docker-compose run --rm web composer update my/package
docker-compose build
```
---
[Wiki](https://github.com/codemix/yii2-dockerized/wiki) for full documentation.
