<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentLibraryCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function documents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Document::class);
    }
}
