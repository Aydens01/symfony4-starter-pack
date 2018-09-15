# Installation

## Create A New Application

This part is an abstract of the following documentation : [Symfony Installation](https://symfony.com/doc/current/setup.html) If you want more details, I recommend you to read it.

First make sure you're using PHP 7.1 or higher and have Composer installed.

Create your new project (for example : my-project) by running :

```sh
$ composer create-project symfony/website-skeleton my-project
```

You could check if it's working by starting the server provided by Symfony 4 :

```sh
$ cd my-project/
$ php bin/console server:run
```

Open your browser and navigate to **http:<span></span>//localhost:8000/**. If everything is working, you'll see a welcome page. Later, when you are finished working, stop the server by pressing **Ctrl+C** from your terminal.

-------
Find here documentations that may help you to develop your application in Symfony 4 : [Documentation](../README.md#documentation)

-------

## Download This Application

You would like to copy the source code's folder of this application in the repository **projects**, do those following commands :

```sh
$ cd projects
$ git clone https://github.com/Aydens01/symfony4-starter-pack.git
```

Then you need to install all the project's dependencies into vendor/ :
```sh
$ cd AIdens/
$ php composer.phar install
```

You'll probably also need to customize your .env and do a few other project-specific tasks (e.g. creating database schema).

### Update your database

If you haven't already a database linked to this project, you have to create it

```sh
$ php bin/console doctrine:database:create
```

------
If this command raises an error it may be due to your connection parameters. Here, a configuration example :

    # config/packages/doctrine.yaml

    parameters:
        # ...

    doctrine :
        dbal:
            # configure these for your database server
            driver: 'pdo_mysql'
            server_version: '5.7'
            dbname: 'database_name'
            user: 'database_user'
            password: 'database_password'

            # ...

        orm :
            # ...

------


Then you have to export your entities :

```sh
# To see the SQL code
$ php bin/console doctrine:schema:update --dump-sql

# To export your entities
$ php bin/console doctrine:schema:update --force
```

### Build Your Assets

At this time, your assets are not compiled and minified, so you will need to install **Webpack Encore**. First, make you sure you install Node.js and also the Yarn package manager.

Then, install Encore into your project with Yarn:
```sh
$ yarn add @symfony/webpack-encore --dev
```

Finally build your assets with one of these commands :
```sh
# compile assets once
$ yarn run encore dev

# recompile assets automatically when files change
$ yarn run encore dev --watch

# compile assets, but also minify & optimize them
$ yarn run encore production
```
