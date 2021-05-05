<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class fetchPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from JSON placeholder, then create/update entries to posts table.';

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
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if ($response->ok()) {
            foreach ($response->json() as $post) {
                Post::updateOrCreate(['id' => $post['id']], $post);
            }

            $this->info('Successfully fetched posts. Data updated.');
        } else {
            $this->error('Something went wrong...');
        }
    }
}
