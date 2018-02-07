<?php

namespace App\Providers;

use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\ServiceProvider;

class HeaderContentProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Header pre-load
        view()->composer('template.partials.header', function($view) {
            $view->with('typesForSale', TemplateController::getPropertyTypesForSale());
            $view->with('typesForRent', TemplateController::getPropertyTypesForRent());
            $view->with('contactInfo', TemplateController::getContactInfo());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
