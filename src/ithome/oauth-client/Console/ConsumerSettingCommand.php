<?php


namespace Ithome\OAuthClient\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

class ConsumerSettingCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'oauth-client:set-consumer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setting a Consumer...';


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
        $clientId = $this->argument('client_id');
        $clientSecret = $this->argument('client_secret');

        $this->clientRepo->create($clientId, $clientSecret);
        $this->info('Client created successfully');
        $this->info('Client ID: '.$clientId);
        $this->info('Client Secret: '.$clientSecret);
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return [

            ['clientId', InputArgument::OPTIONAL, 'Client ID to use.', Str::random()],
            ['clientSecret', InputArgument::OPTIONAL, 'Client Secret to use.', Str::random(32)]
        ];
    }
}