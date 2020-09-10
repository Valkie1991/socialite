<?php namespace Henri\Socialite\Commands;

use Illuminate\Console\Command;

class Install extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'install-socialite';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install the socialite to the application';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$this->call('vendor:publish', [
            '--tag' => 'config',
            '--tag' => 'migrations'
        ]);

        $this->info('Download the config file (config/socialite.php) to your project');

        $this->call('migrate');
	}
}
