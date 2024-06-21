<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Point;

class AwardDailyPoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'points:award-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Award points to users who logged in within the last 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $users = User::where('last_login_at', '>=', Carbon::now()->subHours(24))
            ->get();

        foreach ($users as $user) {
            // Check if the user already received points today
            if (!$user->points()->whereDate('created_at', Carbon::today())->exists()) {
                // Award 1 point
                $user->points()->create([
                    'points' => 1,
                    'action' => 'daily_login',
                ]);
            }
        }

        $this->info('Daily points awarded successfully.');
    }
}
