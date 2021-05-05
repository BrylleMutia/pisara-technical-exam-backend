<?php

namespace App\Console\Commands;

use App\Models\Comment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class fetchComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:comments {limit=100}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch comments from JSON placeholder, then create/update entries to corresponding table.';

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
        $response = Http::get('https://jsonplaceholder.typicode.com/comments?_limit=' . $limit);

        if ($response->ok()) {
            foreach ($response->json() as $comment) {
                Comment::updateOrCreate(['id' => $comment['id']], $comment);
            }

            $this->info('Successfully fetched ' . $limit . ' comments. Data updated.');
        } else {
            $this->error('Something went wrong...');
        }
    }
}
