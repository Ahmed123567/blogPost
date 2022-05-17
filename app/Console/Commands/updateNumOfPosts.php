<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class updateNumOfPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'num_of_post:update_to_two';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'rest number of posts to two every month';

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
        $users = User::where('role' , 0)->get();

        foreach($users as $user){
            $user -> update([
                'num_of_posts' => 2,
            ]);
        }

        return 0;
    }
}
