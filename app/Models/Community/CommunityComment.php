<?php

namespace App\Models\Community;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CommunityComment extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function community_post()
    // {
    //     return $this->belongsTo(CommunityPost::class);
    // }

    public function communityPost()
    {
        return $this->belongsTo(CommunityPost::class, 'community_post_id');
    }

    public function likes()
    {
        return $this->morphMany(CommunityLike::class, 'likeable');
    }
}
