<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeProductCrud extends Command
{
    protected $signature = 'make:product-crud';
    protected $description = 'Generate full CRUD (Model, Migration, Controller, Resource, Request, Routes, Views) for Products';

    public function handle()
    {
        $this->info('🚀 Generating Product CRUD...');

        $this->createModelAndMigration();
        $this->createController();
        $this->createRequests();
        $this->createResource();
        $this->createViews();
        $this->appendRoutes();

        $this->newLine();
        $this->info('✅ Product CRUD generated successfully!');
        $this->info('👉 Run: php artisan migrate');

        return Command::SUCCESS;
    }

    protected function createModelAndMigration()
    {
        $this->call('make:model', [
            'name' => 'Product',
            '--migration' => true
        ]);
    }

    protected function createController()
    {
        $this->call('make:controller', [
            'name' => 'ProductController',
            '--resource' => true,
            '--model' => 'Product'
        ]);
    }

    protected function createRequests()
    {
        $this->call('make:request', [
            'name' => 'StoreProductRequest'
        ]);

        $this->call('make:request', [
            'name' => 'UpdateProductRequest'
        ]);
    }

    protected function createResource()
    {
        $this->call('make:resource', [
            'name' => 'ProductResource'
        ]);
    }

    protected function createViews()
    {
        $viewsPath = resource_path('views/products');

        if (!File::exists($viewsPath)) {
            File::makeDirectory($viewsPath, 0755, true);
        }

        File::put($viewsPath . '/index.blade.php', '<h1>Products Index</h1>');
        File::put($viewsPath . '/create.blade.php', '<h1>Create Product</h1>');
        File::put($viewsPath . '/edit.blade.php', '<h1>Edit Product</h1>');
        File::put($viewsPath . '/show.blade.php', '<h1>Show Product</h1>');

        $this->info('Views created.');
    }

    protected function appendRoutes()
    {
        $routeFile = base_path('routes/web.php');
        $routeEntry = "\nRoute::resource('products', \\App\\Http\\Controllers\\ProductController::class);\n";

        $content = File::get($routeFile);

        if (!str_contains($content, 'Route::resource(\'products\'')) {
            File::append($routeFile, $routeEntry);
            $this->info('Route added to web.php');
        } else {
            $this->warn('Route already exists.');
        }
    }
}