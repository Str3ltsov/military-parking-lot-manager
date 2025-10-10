<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

final class MakeServiceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle(): ?bool
    {
        return parent::handle();
    }

    /**
     * Blueprint for the service class.
     */
    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/service.stub');
    }

    /**
     * Default location of the service class.
     */
    protected function getDefaultNamespace(mixed $rootNamespace): string
    {
        return $rootNamespace.'\\Services';
    }

    /**
     * Resolve the fully qualified path to the stub.
     **/
    private function resolveStubPath(string $stub): string
    {
        $basePath = $this->laravel->basePath(mb_trim($stub, '/'));

        return file_exists($basePath)
            ? $basePath
            : __DIR__.'/../../'.$stub;
    }
}
