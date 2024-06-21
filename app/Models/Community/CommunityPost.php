<?php

namespace App\Models\Community;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CommunityPost extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(CommunityComment::class);
    }

    public function likes()
    {
        return $this->morphMany(CommunityLike::class, 'likeable');
    }
}
