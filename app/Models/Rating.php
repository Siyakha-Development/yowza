<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $guarded =[];

    public static function boot()
    {
        parent::boot();

        static::created(function ($rating) {
            $listing = $rating->listing;
            $listing->updateAverageRating();
        });

        static::updated(function ($rating) {
            $listing = $rating->listing;
            $listing->updateAverageRating();
        });

        static::deleted(function ($rating) {
            $listing = $rating->listing;
            $listing->updateAverageRating();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

}
