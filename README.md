# Laravel Boilerplate Generator Commands

[![Build Status](https://github.com//hariadi/laravel-boilerplate-generator/workflows/Laravel/badge.svg)](https://github.com/laravel-boilerplate-generator/actions)

Generate Model, attribute, relation, scope trait and repository for [Laravel 5 Boilerplate](https://github.com/rappasoft/laravel-5-boilerplate) via console command

## Install

```bash
composer require --dev hariadi/laravel-boilerplate-generator
```

###  Laravel 5.7+

Package already support auto discover and ready to use.

###  Laravel 5.4

Register service provider by adding to your `config/app.php`:

```php
Hariadi\Boilerplate\GeneratorCommandServiceProvider::class,
```
If you want this lib only for dev, you can add the following code to your `app/Providers/AppServiceProvider.php` file, within the `register()` method:
```php
public function register()
{
    if ($this->app->environment() !== 'production') {
        $this->app->register(\Hariadi\Boilerplate\GeneratorCommandServiceProvider::class);
    }
    // ...
}
```

Show command list:

```bash
php artisan list
```

You will see:

```bash
	app
	  app:attribute        Create a new attribute traits for model
	  app:method           Create a new method traits for model
	  app:model            Create a new Eloquent model class with attribute, relationship and scope traits
	  app:relationship     Create a new relationship traits for model
	  app:repository       Create a new repository class
	  app:scope            Create a new scope traits for model
```

## Usage

### Generate Model

**Options**

* `-N|--namespace` : The namespace class. Output strategy will follow this namespace

```bash
php artisan app:model ModelName
```
Generate `ModelName.php` under `Models` directory, and traits for `ModelNameAttribute`, `ModelNameRelationship`, `ModelNameScope` under `Models\ModelName\Traits` directory.

### Generate Attribute

**Options**

* `-N|--namespace` : The namespace class. Output strategy will follow this namespace

```bash
php artisan app:attribute ModelName
```
Generate `ModelNameAttribute.php` under `Models/Traits/Attribute` directory.

### Generate Method

**Options**

* `-N|--namespace` : The namespace class. Output strategy will follow this namespace

```bash
php artisan app:method ModelName
```
Generate `ModelNameMethod.php` under `Models/Traits/Method` directory.

### Generate Relation

**Options**

* `-N|--namespace` : The namespace class. Output strategy will follow this namespace

```bash
php artisan app:relation ModelName
```
Generate `ModelNameRelationship.php` under `Models/Traits/Relationship` directory.

### Generate Scope

**Options**

* `-N|--namespace` : The namespace class. Output strategy will follow this namespace

```bash
php artisan app:scope ModelName
```
Generate `ModelNameScope.php` under `Models/Traits/Scope` directory.

### Generate Repository

**Options**

* `-d|--disable-softdelete` : Disable softdelete method (`forceDelete` and `restore`)

```bash
php artisan app:repository Backend/ModelName
```
Generate `ModelNameRepository.php` under `app/Repositories/Event` directory.

## Output strategy

### Without `--namespace` option
Example files and directories output:

```bash
php artisan app:model ModelName
php artisan app:model AnotherModelName
```

```
app/Models
├── AnotherModelName
│   ├── AnotherModelName.php
│   └── Traits
│       ├── Attribute
│       │   └── AnotherModelNameAttribute.php
│       ├── Method
│       │   └── AnotherModelNameMethod.php
│       ├── Relationship
│       │   └── AnotherModelNameRelationship.php
│       └── Scope
│           └──AnotherModelNameScope.php
└── ModelName
    ├── ModelName.php
    └── Traits
        ├── Attribute
        │   └── ModelNameAttribute.php
        ├── Method
        │   └── ModelNameMethod.php
        ├── Relationship
        │   └── ModelNameRelationship.php
        └── Scope
            └── ModelNameScope.php
```

### With `--namespace` option

Generated combined in given namspace option. Example files and directories output:

```bash
php artisan app:model ModelName --namespace=Survey
php artisan app:model AnotherModelName --namespace=Survey
```

```
app/Models
└── Survey
    ├── ModelName.php
    ├── AnotherModelName.php
    └── Traits
        ├── Attribute
        │   ├── ModelNameAttribute.php
        │   └── AnotherModelNameAttribute.php
        ├── Method
        │   ├── ModelNameMethod.php
        │   └── AnotherModelNameMethod.php
        ├── Relationship
        │   ├── ModelNameRelationship.php
        │   └── AnotherModelNameRelationship.php
        └── Scope
            ├── ModelNameScope.php
            └── AnotherModelNameScope.php
```

## License

The Laravel Boilerplate Generator command is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
