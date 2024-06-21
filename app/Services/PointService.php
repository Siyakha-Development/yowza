<?php

namespace App\Services;

use App\Models\Point;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class PointService
{
    public function awardPoints(Authenticatable $user, int $points, string $action)
    {
        // Ensure the user is an instance of the User model
        if ($user instanceof User) {
            $user->points()->create([
                'points' => $points,
                'action' => $action,
            ]);
        }
    }
}
