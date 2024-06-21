<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;


    /**
     * @var false|mixed|string
     */
    protected $guarded = [

    ];

    protected array $dates = ['date'];

    public function downloadHistories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DownloadHistory::class, 'document_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DocumentLibraryCategory::class, 'document_library_category_id');
    }
}
