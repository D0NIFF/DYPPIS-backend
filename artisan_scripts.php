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
    /*
    "currencies",
    "currency_courses",
    "languages",
    "countries",

    "users",
    "password_reset_tokens",
    "personal_access_tokens",
    */
    "auth_logs",
    "user_confirms",
    "user_notifications",

    "complaints",
    "complaints_statuses",

    "platforms_types",
    "platforms",
    "product_categories",
    "product_deliveries",
    "product_categories_deliveries",
    "product_filters",
    "products",

    "users_countries",
    "users_products",

    "orders",
    "reviews",
    "conflicts",

    "deposits",
    "payouts",
    "payments",
    "refunds",

    "chats",
    "chats_users",
    "messages",
];

foreach ($migrations as $migration) {
    exec(createMigration($migration));
}
