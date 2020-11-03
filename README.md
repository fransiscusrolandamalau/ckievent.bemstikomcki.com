# ckievent.bemstikomcki.com

<a href="https://github.com/fransiscusrolandamalau/ckievent.bemstikomcki.com/actions?query=workflow%3ATests">
    <img src="https://github.com/fransiscusrolandamalau/ckievent.bemstikomcki.com/workflows/Tests/badge.svg" alt="Tests">
</a>

Visit it at [https://ckievent.bemstikomcki.com](https://ckievent.bemstikomcki.com)

## Requirements

The following tools are required in order to start the installation.

- PHP >=7.4
- [Composer](https://getcomposer.org/download/)
- [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)

## What next?
After clone or download this repository, next step is install all dependency required by laravel and laravel-mix.

```shell
# install composer-dependency
$ composer install
# install npm package
$ npm install
# build dev 
$ npm run dev
```

Before we start web server make sure we already generate app key, configure `.env` file and do migration.

```shell
# create copy of .env
$ cp .env.example .env
# create laravel key
$ php artisan key:generate
# laravel migrate
$ php artisan migrate
```

## License

Source code is available under [Apache-2.0 License](./LICENSE.md)  
