<?php

namespace App\Models\Community;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CommunityGroup extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'is_private'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function community_group_members()
    // {
    //     // return $this->belongsToMany(User::class, 'community_group_members');
    //     return $this->belongsToMany(User::class, 'community_group_members')
    //                 ->withPivot('is_admin')
    //                 ->withTimestamps();
    // }

    public function members()
    {
        return $this->belongsToMany(User::class, 'community_group_members', 'community_group_id', 'user_id')
                    ->withPivot('is_admin')
                    ->withTimestamps();
    }

    public function group_posts()
    {
        return $this->hasMany(CommunityGroupPost::class, 'community_group_id');
    }
}
