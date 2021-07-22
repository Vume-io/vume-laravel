<?php

namespace Vume\Laravel\Commands;

use Illuminate\Console\Command;
use Vume\Laravel\Libraries\CMS as Vume;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vume:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear cached results';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $vume = new Vume();
        $vume->clearCache();
    }
}