<?php

namespace App\Models\Community;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLike extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function likeable()
    {
        return $this->morphTo();
    }
}
