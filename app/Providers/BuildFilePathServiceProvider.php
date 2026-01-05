<?php

declare(strict_types=1);

namespace App\Providers;

use Exception;
use Illuminate\Support\ServiceProvider;

final class BuildFilePathServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->viewWithBuildFilePaths();
    }

    /**
     * View with build file paths.
     */
    private function viewWithBuildFilePaths()
    {
        if ($this->app->isProduction()) {
            view()->composer('layouts.mod', function ($view) {
                $srcPaths = [
                    'cssBuildFilePath' => 'resources/css/app.css',
                    'jsBuildFilePath' => 'resources/js/app.js',
                ];

                foreach ($srcPaths as $name => $path) {
                    $view->with($name, $this->getBuildFilePath($path));
                    logger()->info("Moderator view is initialized with $name, that has build file path as $path");
                }
            });
        }
    }

    /**
     * Get build file path.
     */
    private function getBuildFilePath(string $srcPath): string
    {
        $manifestData = $this->getManifestData();
        $buildFilePath = $manifestData[$srcPath]['file'];

        if (! isset($buildFilePath) && ! file_exists(public_path("build/$buildFilePath"))) {
            $message = "$buildFilePath does not exist in ".public_path('build');

            logger()->error($message);

            throw new Exception($message);
        }

        return $buildFilePath;
    }

    /**
     * Get manifest data.
     */
    private function getManifestData(): array
    {
        $manifestPath = public_path('build/manifest.json');

        if (! file_exists($manifestPath)) {
            $message = "$manifestPath does not exist in ".public_path('build');

            logger()->error($message);

            throw new Exception($message);
        }

        return json_decode($manifestPath, true);
    }
}
