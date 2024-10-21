<?php

function createMigration(array $names) : void
{
    foreach ($names as $name)
    {
        exec("php artisan make:migration create_{$name}_table");
    }
    //return "php artisan make:migration create_{$name}_table";
}

function createModel($name) : string
{
    return "php artisan make:model {$name}";
}

$migrations = [
    /*
    "currencies",
    "currency_courses",
    "languages",
    "countries",

    "users",
    "password_reset_tokens",
    "personal_access_tokens",

    "auth_logs",
    "user_confirms",
    "user_notifications",
    */

    /*
    "complaints",
    "complaint_statuses",
    */

    /*
    "platforms_types",
    "platforms",
    "product_categories",
    "product_deliveries",
    "product_categories_deliveries",
    "product_filters",
    "products",
    */

    /*
    "countries_users",
    "products_users",

    "orders",
    "reviews",
    "conflicts",
    */

    /*
    "deposits",
    "payouts",
    "payments",
    "refunds",

    "chats",
    "chats_users",
    "messages",
    */
];

createMigration($migrations);
