<?php
/**
 *
 * @package   ithome/
 * @author    Clark <clark@mail.ithome.com.tw>
 * @copyright Copyright (c) Clark
 * [ see  https://github.com/artdarek/oauth-4-laravel ]
 */

namespace Ithome\OAuthClient;

use Illuminate\Support\ServiceProvider;
use Ithome\OAuthClient\Console\ConsumerSettingCommand;
use Ithome\OAuthClient\Console\MigrationsCommand;
use Ithome\OAuthClient\Console\OAuthLibraryCommand;

class OAuthClientServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     * @return void
     */
    public function boot()
    {
        $this->package('ithome/oauthclient', 'oauthclient', __DIR__.'/');
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->registerErrorHandlers();
        $this->registerCommands();
    }


    /**
     * Get the services provided by the provider.
     * @return string[]
     * @codeCoverageIgnore
     */
    public function provides()
    {
        return [];
    }

    /**
     * Registers some utility commands with artisan
     * @return void
     */
    public function registerCommands()
    {

        //定義指令檔的動作
        $this->app->bind('command.oauth-client.library_create', 'Ithome\OAuthClient\Console\OAuthLibraryCommand');
        $this->app->bind('command.oauth-client.migrations', 'Ithome\OAuthClient\Console\MigrationsCommand');
        $this->app->bind('command.oauth-client.set-consumer', 'Ithome\OAuthClient\Console\ConsumerSettingCommand');

        //action 指令
        $this->commands('command.oauth-client.library_create','command.oauth-client.migrations','command.oauth-client.set-consumer');
    }

    /**
     * Register the OAuth error handlers
     * @return void
     */
    private function registerErrorHandlers()
    {
        $this->app->error(function(OAuthException $e) {
            if($e->shouldRedirect()) {
                return new RedirectResponse($e->getRedirectUri());
            } else {
                return new JsonResponse([
                                'error' => $e->errorType,
                                'error_description' => $e->getMessage()
                        ],
                        $e->httpStatusCode,
                        $e->getHttpHeaders()
                );
            }
        });
    }
}
