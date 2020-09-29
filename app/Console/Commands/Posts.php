<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class Posts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:list  {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post list from posts table';

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
        $headers = ["ID", "TITLE", "BODY"];
        $posts = Post::select('id','title','body')->where('id',$this->argument('id'))->get();
        $this->table($headers,$posts);
    }
}
