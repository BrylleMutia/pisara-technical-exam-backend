<?php

namespace App\Console\Commands;

use App\Models\Album;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class fetchAlbums extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:albums {limit=100}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch albums from JSON placeholder, then create/update entries to corresponding table.';

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
        $response = Http::get('https://jsonplaceholder.typicode.com/albums?_limit=' . $limit);

        if ($response->ok()) {
            foreach ($response->json() as $album) {
                Album::updateOrCreate(['id' => $album['id']], $album);
            }

            $this->info('Successfully fetched ' . $limit . ' albums. Data updated.');
        } else {
            $this->error('Something went wrong...');
        }
    }
}
