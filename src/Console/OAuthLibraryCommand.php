<?php

namespace Ithome\OAuthClient\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class OAuthLibraryCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'oauth-client:library_create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a ithome OAuth client library ';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new reminder table command instance.
     *
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        // $this->comment($this->laravel['path.base']);
        $destination = $this->laravel['path.base'].'/vendor/lusitanian/oauth/src/OAuth/OAuth2/Service/ithome.php';
        $origin = __DIR__.'/../subs/ithome.stub';

        if (!$this->files->exists($destination)) {
            $this->files->copy($origin, $destination);

            $this->info('Ithome OAuth Client Library created successfully!');

            $this->comment("Move file to ".$destination."......");
        }
        else {
            $this->error('Ithome OAuth Client Library already exists!');
        }

        if (!$this->files->exists($origin)) {
            $this->info('The Library not exists!');
        }

    }
}
