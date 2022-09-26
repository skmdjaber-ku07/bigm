<?php

namespace App\Providers;

use View;
use App\Http\Composers\FormViewComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('partials.applicant_form', 'App\Http\Composers\FormViewComposer@applicantForm');
    }
}
