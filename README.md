# deis-php-example


## How-to

```
# clone it
$ git clone https://github.com/lorieri/deis-php-example.git
$ cd deis-php-example.git

# run mysql
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

# load the environments
$ deis config:push

# build it
$ git push deis master

# open it
$ deis open

```
