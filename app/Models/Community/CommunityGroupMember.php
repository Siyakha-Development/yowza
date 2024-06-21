<?php

namespace App\Models\Community;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CommunityGroupMember extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function community_group()
    {
        return $this->belongsTo(CommunityGroup::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
