<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relationship with roles
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        // Use the belongsToMany relationship provided by Spatie
        return $this->belongsToMany(Role::class, 'role_has_permissions', 'permission_id', 'role_id');
    }

    // Relationship with users
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        // Use the belongsToMany relationship provided by Spatie
        return $this->belongsToMany(User::class, 'model_has_permissions', 'permission_id', 'model_id')
            ->where('model_type', User::class);
    }
}
