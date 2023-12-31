> This is a fork of [DigitalCloud/laravel-model-notes](https://github.com/DigitalCloud/laravel-model-notes) due of
> lacking maintenance we decided to keep it up, and adjust to our needs.

# Laravel Model Notes

This package allows you to add notes to your model.

## Description

Suppose you are working on model, say Invoice model, and this invoice need to pass some management process. Each
management state need the manager to add some notes on this invoice, and you need to track all notes for this invoice.
This package allow you to do this job just by adding some trait to your model.

## Add note to Eloquent models

This package provides a `HasNotes` trait that, once installed on a model, allows you to do things like this:

```php
// add a note
$model->setNote('New Note Here');

// get all notes
$model->notes();
```

## Installation

You can install the package via composer:

```bash
composer require suppme/laravel-noteable
```

You must publish the migration with:

```bash
php artisan vendor:publish --provider="Suppme\ModelNotes\ModelNotesServiceProvider" --tag="migrations"
```

Migrate the `notes` table:

```bash
php artisan migrate
```

Optionally you can publish the config-file with:

```bash
php artisan vendor:publish --provider="Suppme\ModelNotes\ModelNotesServiceProvider" --tag="config"
```

This is the contents of the file which will be published at `config/models-notes.php`

```php
return [

    /*
     * The class name of the note model that holds all notes.
     * 
     * The model must be or extend `Suppme\ModelNotes\Note::class`.
     */
    'note_model' => Suppme\ModelNotes\Note::class,

    /*
     * The name of the column which holds the ID of the model related to the notes.
     *
     * You can change this value if you have set a different name in the migration for the notes table.
     */
    'model_primary_key_attribute' => 'model_id',

];
```

## Usage

Add the `HasNotes` trait to a model you like to use notes on.

```php
use Suppme\ModelNotes\HasNotes;

class YourEloquentModel extends Model
{
    use HasNotes;
}
```

### add a new note

You can add a new note like this:

```php
$model->setNote('new note');
```

### Retrieving notes

you can get all associated notes of a model like this:

```php
$allNotes = $model->notes;
```

### Custom model and migration

You can change the model used by specifying a class name in the `note_model` key of the `model-notes` config file.

You can change the column name used in the note table (`model_id` by default) when using a custom migration where you
changed
that. In that case, simply change the `model_primary_key_attribute` key of the `model-notes` config file. 
