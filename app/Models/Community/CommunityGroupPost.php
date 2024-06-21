<?php

namespace App\Models\Community;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CommunityGroupPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function communty_group()
    {
        return $this->belongsTo(CommunityGroup::class, 'community_group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community_comments()
    {
        return $this->hasMany(CommunityComment::class);
    }

    public function likes()
    {
        return $this->morphMany(CommunityLike::class, 'likeable');
    }
}
