# {{PROJECT_NAME}}

## Development

### MAMP

|Setting|Value|
|---|---|
|Apache Port|8888|
|MySQL Port|8889|

### Database

1. Create a local UTF8 database ```wp_{{PROJECT_SLUG}}_development```
2. Export the production or staging database with [Sequel Pro](http://www.sequelpro.com/) and import it (```$ heroku config -a {{PROJECT_SLUG}}-wp-p```)

### Composer

Composer is a PHP package manager. The command is installed in the Mr. Henry Dropbox Tools folder.

#### Install bundle

```
$ composer install
```

#### Update bundle

If you want install additional plugins or update the WP core, update the composer.json file and run:

```
$ composer update
```

#### Add plugins

Search on [https://wpackagist.org/](https://wpackagist.org/) and add to composer.json and run the composer command again.
