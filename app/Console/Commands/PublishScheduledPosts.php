<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
class PublishScheduledPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info("Cron Job running at ". now());
                $posts = Post::where('timer', '<=', now())
                ->where('is_active', false)
                ->get();

        foreach ($posts as $post) {
            $post->is_active = true;
            $post->save();

            $this->info("Published post: {$post->title}");
        }

        if ($posts->isEmpty()) {
            $this->info('No scheduled posts to publish.');
        }

    }
}
