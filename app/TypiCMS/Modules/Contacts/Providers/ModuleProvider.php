<?php
namespace TypiCMS\Modules\Contacts\Providers;

use Lang;
use View;
use Config;

use Illuminate\Support\ServiceProvider;

// Model
use TypiCMS\Modules\Contacts\Models\Contact;

// Repo
use TypiCMS\Modules\Contacts\Repositories\EloquentContact;

// Cache
use TypiCMS\Modules\Contacts\Repositories\CacheDecorator;
use TypiCMS\Services\Cache\LaravelCache;

// Form
use TypiCMS\Modules\Contacts\Services\Form\ContactForm;
use TypiCMS\Modules\Contacts\Services\Form\ContactFormLaravelValidator;

class ModuleProvider extends ServiceProvider
{

    public function boot()
    {
        // Bring in the routes
        require __DIR__ . '/../routes.php';

        // Add dirs
        View::addLocation(__DIR__ . '/../Views');
        Lang::addNamespace('contacts', __DIR__ . '/../lang');
        Config::addNamespace('contacts', __DIR__ . '/../config');
    }

    public function register()
    {

        $app = $this->app;

        $app->bind('TypiCMS\Modules\Contacts\Repositories\ContactInterface', function ($app) {
            $repository = new EloquentContact(new Contact);
            if ( ! Config::get('app.cache')) {
                return $repository;
            }
            $laravelCache = new LaravelCache($app['cache'], 'Contacts', 10);

            return new CacheDecorator($repository, $laravelCache);
        });

        $app->bind('TypiCMS\Modules\Contacts\Services\Form\ContactForm', function ($app) {
            return new ContactForm(
                new ContactFormLaravelValidator( $app['validator'] ),
                $app->make('TypiCMS\Modules\Contacts\Repositories\ContactInterface')
            );
        });

        $app->before(function ($request, $response) {
            require __DIR__ . '/../breadcrumbs.php';
        });

    }

}
