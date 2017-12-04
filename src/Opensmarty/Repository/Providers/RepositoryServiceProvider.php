<?php
namespace Opensmarty\Repository\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package Opensmarty\Repository\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(base_path('vendor/prettus/l5-repository/src/resources/config/repository.php'), 'repository');

        $this->loadTranslationsFrom(base_path('vendor/prettus/l5-repository/src/resources/lang'), 'repository');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands('Opensmarty\Repository\Generators\Commands\RepositoryCommand');
        $this->commands('Opensmarty\Repository\Generators\Commands\TransformerCommand');
        $this->commands('Opensmarty\Repository\Generators\Commands\PresenterCommand');
        $this->commands('Opensmarty\Repository\Generators\Commands\EntityCommand');
        $this->commands('Opensmarty\Repository\Generators\Commands\ValidatorCommand');
        $this->commands('Opensmarty\Repository\Generators\Commands\ControllerCommand');
        $this->commands('Opensmarty\Repository\Generators\Commands\BindingsCommand');
        $this->commands('Opensmarty\Repository\Generators\Commands\CriteriaCommand');
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
