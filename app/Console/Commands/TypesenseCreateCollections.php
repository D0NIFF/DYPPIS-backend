<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Typesense\Client;
use App\Models\ProductService\Product;

class TypesenseCreateCollections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'typesense:create-collections';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the collections of Typesense for the all models';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client([
            'api_key' => env('TYPESENSE_API_KEY'),
            'nodes' => [
                [
                    'host' => env('TYPESENSE_HOST'),
                    'port' => env('TYPESENSE_PORT'),
                    'protocol' => env('TYPESENSE_PROTOCOL'),
                ],
            ],
            'client_timeout_seconds' => 2,
        ]);

        $models = [
            Product::class,
            // Other classes
        ];

        foreach ($models as $model) {
            $instance = new $model;
            $settings = $instance->typesenseIndexSettings();
            $client->collections->create([
                'name' => $instance->getTable(),
                'fields' => $settings['fields'],
                'default_sorting_field' => $settings['default_sorting_field'],
            ]);
        }

        $this->info('Successfully created collections.');
    }
}
