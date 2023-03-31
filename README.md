# [Nemaxe](https://github.com/JackEd0/nemaxe)

Nemaxe is web interface that allow users to create and test school exercises.

Curent version: 1.3.0

## Instalation

Before updloading
Make sure to upload in root folder of remote server and not in public_html.
Upload everything in `public` to `public_html`.

Create `.env` from `.env.example`. And update the config data in it. DB_DATABASE...
Run `composer install`.
Run sql in nemaxe.sql

If database connection failed reading the `.env` file then change the `config\database.php` creds.
Be carefull to use `localhost` instead of `127.0.0.1` when asked by the provider.

Also in `config\app.php` update the `env('APP_KEY'`


### Features

 - Login / Register
 - Browser exercises
 - Create/Read/Update/Delete subjects
 - CRUDE classes
 - Manage users

### Technologies used

```
├────── php
│   ├── Laravel
│   └── mysql
├── css
│   ├── Less
│   └── Bootstrap
└── js
    ├── Jquery
    └── Datatable
```

### Creator

**Jack**: <https://github.com/JackEd0>

### Notes

Started: 26 January 2017
Last updated: 28 June 2017
67hrs of work
