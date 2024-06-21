<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMMEWorkspace extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

    public function assignRoleToUser($userId, $role): void
    {
        $this->users()->attach($userId, ['role' => $role]);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 's_m_m_e_workspace_user')->withPivot('role');
    }

    public function owner()
    {
        return $this->users()->wherePivot('role', 'team_leader')->first();
    }

}
