<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use OpenAI;

class OpenAIServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(OpenAI::class, function ($app) {
            return OpenAI::client(env('OPENAI_API_KEY'));
        });
    }
}
