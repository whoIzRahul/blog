<?php

namespace App\Providers;

use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->bind(
            Newsletter::class,function(){
                $client = new ApiClient();
                $client->setConfig([
                    'apiKey' => config('services.mailchimp.key'),
                    'server' => 'us10'
                    ]);
                return new MailchimpNewsletter($client);
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Use to make all the properties fillable of all models
        //Model::unguard();
    }
}
