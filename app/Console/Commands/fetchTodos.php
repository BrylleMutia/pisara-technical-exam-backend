<?php

namespace App\Console\Commands;

use App\Models\Todo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class fetchTodos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:todos {limit=100}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch photos from JSON placeholder, then create/update entries to corresponding table.';

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
        $response = Http::get('https://jsonplaceholder.typicode.com/todos?_limit=' . $limit);

        if ($response->ok()) {
            foreach ($response->json() as $todo) {
                Todo::updateOrCreate(['id' => $todo['id']], $todo);
            }

            $this->info('Successfully fetched ' . $limit . ' todos. Data updated.');
        } else {
            $this->error('Something went wrong...');
        }
    }
}
