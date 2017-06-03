# Laravel Boilerplate Generator Commands

Generate Model, attribute, relation, scope trait and repository for [Laravel 5 Boilerplate](https://github.com/rappasoft/laravel-5-boilerplate) via console command

## Install (Laravel Boilerplate 5.4)

```bash
composer require --dev hariadi/laravel-boilerplate-generator
```

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

You must see:

```bash
	app
	  app:attribute        Create a new attribute traits for model
	  app:model            Create a new Eloquent model class with attribute, relationship and scope traits
	  app:relationship     Create a new relationship traits for model
	  app:repository       Create a new repository class
	  app:scope            Create a new scope traits for model
```

## Usage

### Generate Model

```bash
php artisan app:model ModelName
```
Generate `ModelName.php` under `Models` directory, and traits for `ModelNameAttribute`, `ModelNameRelationship`, `ModelNameScope` under `Models\ModelName\Traits` directory.

### Generate Attribute

```bash
php artisan app:attribute ModelName
```
Generate `ModelNameAttribute.php` under `Models/Traits/Attribute` directory.

### Generate Relation

```bash
php artisan app:relation ModelName
```
Generate `ModelNameRelationship.php` under `Models/Traits/Relationship` directory.

### Generate Scope

```bash
php artisan app:scope ModelName
```
Generate `ModelNameScope.php` under `Models/Traits/Scope` directory.

### Generate Repository

```bash
php artisan app:repository Backend/ModelName
```
Generate `ModelNameRepository.php` under `app/Repositories/Event` directory.

## License

The Laravel Boilerplate Generator command is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
