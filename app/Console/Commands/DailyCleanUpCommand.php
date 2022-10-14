<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DailyCleanUpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:new:records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $time = now()->subHours(24);

        // get likes and delete
        Like::where('created_at', '>=', $time)->delete();

        // get comments and delete likes and record.
        $comment_list = Comment::where('created_at', '>=', $time)->withTrashed()->get();
        foreach ($comment_list as $record) {
            $this->delete_record($record);
        }

        // get posts and delete comments, likes and record
        $omit = User::whereIn('username', ['kpomeru', 'vertebradigital'])->pluck('id')->toArray();
        $post_list = Post::whereNotIn('user_id', $omit)->where('created_at', '>=', $time)->withTrashed()->get();
        foreach ($post_list as $record) {
            $this->delete_record($record);
        }

        // get users and delete.
        User::where('created_at', '>=', $time)->withTrashed()->forceDelete();

        $this->info("Clean-up complete.");
        return Command::SUCCESS;
    }

    public function delete_record($model): void
    {
        if (get_class($model) === 'App\Models\Post') {
            $file = $model->getOriginal('image');
            if (isset($file)) {
                Storage::delete($model->getOriginal('image'));
            }

            $model->comments()->forceDelete();
        }

        $model->likes()->delete();
        $model->forceDelete();
    }
}
