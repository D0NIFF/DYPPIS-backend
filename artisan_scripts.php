<?php

function createMigration($name) : string
{
    return "php artisan make:migration create_{$name}_table";
}

function createModel($name) : string
{
    return "php artisan make:model {$name}";
}

$migrations = [
    "currencies",
    "currency_courses",
    "languages",
    "countries",
];

foreach ($migrations as $migration) {
    exec(createMigration($migration));
}
