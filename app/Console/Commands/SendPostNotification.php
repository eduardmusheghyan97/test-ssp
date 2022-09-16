<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailJob;
use App\Models\Post;
use Illuminate\Console\Command;

class SendPostNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Post::where('notified', false)->with('website')->chunkById(100, function ($posts) {
            foreach ($posts as $post) {
                $subscribers = $post->website->subscribers;
                $subscriber_count = 0;
                if(count($subscribers)){
                    foreach ($subscribers as $subscriber) {
                        $subscriber_count++;
                        if($subscriber_count > $post['notified_subscribers_count']){
                            SendEmailJob::dispatch($subscriber, $post);
                            $post->update(['notified_subscribers_count' => $subscriber_count]);
                        }
                    }
                }
                $post->update(['notified' => true]);
            }
        });
        return 0;
    }
}
