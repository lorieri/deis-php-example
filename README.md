# deis-php-example

A simple heroku style 12 factor php app example to be deployed on Deis.io and show how to:

* use an external docker for backends
* connect to a database
* connect to a memcached
* install dependencies
* use environment variables
* load variables with deis config:pull

## How-to

```
# clone it
$ git clone https://github.com/lorieri/deis-php-example.git
$ cd deis-php-example.git

# run mysql keeping tables outside docker
$ sudo mkdir /var/lib/mysql
$ sudo docker run --name mysql -p 3306:3306 -v /var/lib/mysql:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=pass -d mysql

# load sql
$ cat my.sql | mysql -uroot -ppass -h 127.0.0.1

# run memcached
$ sudo docker run -p 11211:11211 --name memcache -d memcached

# register or login into deis
$ deis register mydeis.host
...
$ deis login
...

# create the app
$ deis create myapp

# edit the environment
$ vim .env

# load the environment
$ deis config:push

# build it
$ git push deis master

# open it
$ deis open

# scale it
$ deis scale web=8
```
