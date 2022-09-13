<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailJob;
use App\Models\Post;
use App\Models\Website;
use App\Notifications\CreatedPostNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class SendPostNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:notification {postID?}';

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
        DB::table('posts')->where('notified', false)->chunkById(100, function ($posts) {
            foreach ($posts as $post) {
                $website = Website::find($post->website_id);
                $subscribers = $website->subscribers;
                $i = 0;
                foreach ($subscribers as $subscriber) {
                    if(!$subscriber['notified']){
                        $i += 1;
                        SendEmailJob::dispatch($subscriber, $post);
                        DB::table('subscribers')->where('id',$subscriber['id'])->update(['notified' => true]);
                    }
                    if($i == 2) break;
                }
                DB::table('posts')->where('id',$post->id)->update(['notified' => true]);
                DB::table('subscribers')->update(['notified' => false]);
                dd(123);
            }
        });
        return 0;
    }
}
