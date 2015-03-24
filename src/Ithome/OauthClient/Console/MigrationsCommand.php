<?php
/**

 */

namespace Ithome\OAuthClient\Console;

use Illuminate\Console\Command;

class MigrationsCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'oauth-client:migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the migrations ';

    /**
     * Create a new reminder table command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->call('migrate:publish', ['package' => 'ithome/oauth-client']);
        $this->call('dump-autoload');
    }
}
