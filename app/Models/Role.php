<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


//    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
//    {
//        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
//    }

}
