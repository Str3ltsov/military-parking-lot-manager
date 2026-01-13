<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factories\Factory;

arch()->preset()->php();
arch()->preset()->laravel()
    ->ignoring([
        'App\Dtos',
        'App\Providers\Filament',
    ]);
arch()->preset()->security();

arch('Annotations')
    ->expect('App')
    ->toHavePropertiesDocumented()
    ->toHaveMethodsDocumented();

arch('Avoid mutation')
    ->expect('App')
    ->classes()
    ->toBeReadonly()
    ->ignoring([
        'App\Console\Commands',
        'App\Http\Controllers',
        'App\Http\Requests',
        'App\Models',
        'App\Providers',
        'App\Services',
        'App\Queries',
        'App\Livewire',
    ]);

arch('Avoid inheritance')
    ->expect('App')
    ->classes()
    ->toExtendNothing()
    ->ignoring([
        'App\Console\Commands',
        'App\Http\Controllers',
        'App\Http\Requests',
        'App\Models',
        'App\Providers',
        'App\Services',
        'App\Queries',
        'App\Livewire',
    ]);

arch('Avoid extension')
    ->expect('App')
    ->classes()
    ->toBeFinal();

arch('Avoid abstraction')
    ->expect('App')
    ->not->toBeAbstract();

arch('Controllers')
    ->expect('App\Http\Controllers')
    ->not->toBeUsed();

arch('Models')
    ->expect('App\Models')
    ->toHaveMethod('casts')
    ->toOnlyBeUsedIn([
        'App\Http',
        'App\Models',
        'App\Providers',
        'App\Services',
        'App\Queries',
        'Database\Factories',
        'Database\Seeders',
    ]);

arch('Factories')
    ->expect('Database\Factories')
    ->toExtend(Factory::class)
    ->toHaveMethod('definition')
    ->toOnlyBeUsedIn([
        'App\Models',
    ]);
