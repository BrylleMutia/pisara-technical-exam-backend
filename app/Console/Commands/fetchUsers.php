<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class fetchUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:users {limit=100}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch users from JSON placeholder, then create/update entries to corresponding table.';

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
        $limit = $this->argument('limit');
        $response = Http::get('https://jsonplaceholder.typicode.com/users?_limit=' . $limit);

        if ($response->ok()) {
            foreach ($response->json() as $user) {
                User::updateOrCreate(['id' => $user['id']], $user);
            }

            $this->info('Successfully fetched ' . $limit . ' users. Data updated.');
        } else {
            $this->error('Something went wrong...');
        }
    }
}
