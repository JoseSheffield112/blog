<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(Newsletter::class, function (){
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us21'
            ]);

            return new MailchimpNewsletter($client);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // THIS IS WHERE YOU CONFIRM THE SERVICES YOU'RE USING
        // e.g. for bootstrap pagination
        // Paginator::useBootstrap();

        // Model::unguard(); // this will allow all fields for all ActiveRecords to be mass assignable

        Gate::define('admin', function (User $user) {
            return $user->username == "Jose";
        });

        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });
    }
}
