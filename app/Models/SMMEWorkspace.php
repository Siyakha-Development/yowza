<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class SMMEWorkspace extends Model
{
    use HasFactory, Searchable;
    protected $guarded = [

    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'smme_business_name' => $this->smme_business_name,
            'smme_description_of_business' => $this->smme_description_of_business,
            'smme_industry' => $this->smme_industry,
            'location' => $this->location,
        ];
    }

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
