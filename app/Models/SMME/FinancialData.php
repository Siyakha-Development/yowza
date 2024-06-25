<?php

namespace App\Models\SMME;

use App\Models\SMMEWorkspace;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FinancialData extends Model
{
    use HasFactory;

    protected $fillable = [
        's_m_m_e_workspace_id',
        'user_id',
        'total_income',
        'total_expenses',
        'net_income',
        'prev_mon_net_income',
    ];

    public function workspace()
    {
        return $this->belongsTo(SMMEWorkspace::class, 's_m_m_e_workspace_id');
    }
}
