<?php
return array(


	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => false,

	/*
	|--------------------------------------------------------------------------
	| Application Cache
	|--------------------------------------------------------------------------
	*/

	'cache' => true,

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => 'http://typicms.samsfactory.com',

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default timezone for your application, which
	| will be used by the PHP date and date-time functions. We have gone
	| ahead and set this to a sensible default for you out of the box.
	|
	*/

	'timezone' => 'Europe/Brussels',

	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	|
	| The application locale determines the default locale that will be used
	| by the translation service provider. You are free to set this value
	| to any of the locales which will be supported by the application.
	|
	*/

	'locales' => array('fr', 'nl', 'en'),
	'locale' => 'en',

	'modules' => array(
		'Pages'        => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\Pages\Models\Page'),
		'Files'        => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\Files\Models\File'),
		'News'         => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\News\Models\News'),
		'Events'       => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\Events\Models\Event'),
		'Categories'   => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\Categories\Models\Category'),
		'Projects'     => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\Projects\Models\Project'),
		'Places'       => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\Places\Models\Place'),
		'Menus'        => array('menu' => true , 'dashboard' => false, 'model' => 'TypiCMS\Modules\Menus\Models\Menu'),
		'Menulinks'    => array('menu' => false, 'dashboard' => false, 'model' => 'TypiCMS\Modules\Menulinks\Models\Menulink'),
		'Tags'         => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\Tags\Models\Tag'),
		'Users'        => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\Users\Models\User'),
		'Groups'       => array('menu' => true , 'dashboard' => true , 'model' => 'TypiCMS\Modules\Groups\Models\Group'),
		'Translations' => array('menu' => true , 'dashboard' => false, 'model' => 'TypiCMS\Modules\Translations\Models\Translation'),
		'Contacts'     => array('menu' => true , 'dashboard' => true,  'model' => 'TypiCMS\Modules\Contacts\Models\Contact'),
	),

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => 'dmPUc2CDU6sL15UQerWGKIdK5QzXtgji',

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this array to grant expanded functionality to your applications.
	|
	*/

	'providers' => array(

		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Session\CommandsServiceProvider',
		'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
		'Illuminate\Routing\ControllerServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Html\HtmlServiceProvider',
		'Illuminate\Log\LogServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Database\MigrationServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Remote\RemoteServiceProvider',
		'Illuminate\Auth\Reminders\ReminderServiceProvider',
		'Illuminate\Database\SeedServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		// 'Illuminate\Translation\TranslationServiceProvider',
		'TypiCMS\Modules\Translations\Providers\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider',
		'Illuminate\Workbench\WorkbenchServiceProvider',

		'Cartalyst\Sentry\SentryServiceProvider',

		'Barryvdh\Debugbar\ServiceProvider',
		'Clockwork\Support\Laravel\ClockworkServiceProvider',

		'Krucas\Notification\NotificationServiceProvider',
		'Bkwld\Croppa\ServiceProvider',
		'Thomaswelton\LaravelGravatar\LaravelGravatarServiceProvider',
		'DaveJamesMiller\Breadcrumbs\ServiceProvider',
		'Msurguy\Honeypot\HoneypotServiceProvider',
		'LeroyMerlin\LaraSniffer\ServiceProvider',
		// 'McCool\DatabaseBackup\ServiceProviders\LaravelServiceProvider', // PHP 5.4 only

		'TypiCMS\Providers\StartProvider',
		'TypiCMS\Providers\UploadServiceProvider',
		'TypiCMS\Providers\TypiCMSServiceProvider',

	),

	/*
	|--------------------------------------------------------------------------
	| Service Provider Manifest
	|--------------------------------------------------------------------------
	|
	| The service provider manifest is used by Laravel to lazy load service
	| providers which are not needed for each request, as well to keep a
	| list of all of the services. Here, you may set its storage spot.
	|
	*/

	'manifest' => storage_path().'/meta',

	/*
	|--------------------------------------------------------------------------
	| Class Aliases
	|--------------------------------------------------------------------------
	|
	| This array of class aliases will be registered when this application
	| is started. However, feel free to register as many as you wish as
	| the aliases are "lazy" loaded so they don't hinder performance.
	|
	*/

	'aliases' => array(

		'App'             => 'Illuminate\Support\Facades\App',
		'Artisan'         => 'Illuminate\Support\Facades\Artisan',
		'Auth'            => 'Illuminate\Support\Facades\Auth',
		'Blade'           => 'Illuminate\Support\Facades\Blade',
		'Cache'           => 'Illuminate\Support\Facades\Cache',
		'ClassLoader'     => 'Illuminate\Support\ClassLoader',
		'Config'          => 'Illuminate\Support\Facades\Config',
		'Controller'      => 'Illuminate\Routing\Controller',
		'Cookie'          => 'Illuminate\Support\Facades\Cookie',
		'Crypt'           => 'Illuminate\Support\Facades\Crypt',
		'DB'              => 'Illuminate\Support\Facades\DB',
		'Eloquent'        => 'Illuminate\Database\Eloquent\Model',
		'Event'           => 'Illuminate\Support\Facades\Event',
		'File'            => 'Illuminate\Support\Facades\File',
		'Form'            => 'Illuminate\Support\Facades\Form',
		'Hash'            => 'Illuminate\Support\Facades\Hash',
		'HTML'            => 'Illuminate\Support\Facades\HTML',
		'Input'           => 'Illuminate\Support\Facades\Input',
		'Lang'            => 'Illuminate\Support\Facades\Lang',
		'Log'             => 'Illuminate\Support\Facades\Log',
		'Mail'            => 'Illuminate\Support\Facades\Mail',
		'Paginator'       => 'Illuminate\Support\Facades\Paginator',
		'Password'        => 'Illuminate\Support\Facades\Password',
		'Queue'           => 'Illuminate\Support\Facades\Queue',
		'Redirect'        => 'Illuminate\Support\Facades\Redirect',
		'Redis'           => 'Illuminate\Support\Facades\Redis',
		'Request'         => 'Illuminate\Support\Facades\Request',
		'Response'        => 'Illuminate\Support\Facades\Response',
		'Route'           => 'Illuminate\Support\Facades\Route',
		'Schema'          => 'Illuminate\Support\Facades\Schema',
		'Seeder'          => 'Illuminate\Database\Seeder',
		'Session'         => 'Illuminate\Support\Facades\Session',
		'SSH'             => 'Illuminate\Support\Facades\SSH',
		'Str'             => 'Illuminate\Support\Str',
		'URL'             => 'Illuminate\Support\Facades\URL',
		'Validator'       => 'Illuminate\Support\Facades\Validator',
		'View'            => 'Illuminate\Support\Facades\View',

		'Sentry'          => 'Cartalyst\Sentry\Facades\Laravel\Sentry',
		'Translatable'    => 'Dimsav\Translatable\Translatable',
		'Debugbar'        => 'Barryvdh\Debugbar\Facade',
		'Notification'    => 'Krucas\Notification\Facades\Notification',
		'Croppa'          => 'Bkwld\Croppa\Facade',
		'Gravatar'        => 'Thomaswelton\LaravelGravatar\Facades\Gravatar',
		'Breadcrumbs'     => 'DaveJamesMiller\Breadcrumbs\Facade',

		'Menu'            => 'TypiCMS\Modules\Menus\Models\Menu',
		'FileUpload'      => 'TypiCMS\Facades\FileUpload',
		'TypiCMS'         => 'TypiCMS\Facades\TypiCMS',

	),

);
