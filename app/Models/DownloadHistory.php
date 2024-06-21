<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadHistory extends Model
{
    use HasFactory;
    protected int $document_id = 0;
    /**
     * @var int|mixed|string|null
     */
    public mixed $user_id;
    /**
     * @var \Illuminate\Support\Carbon|mixed
     */


    /**
     * @var \Illuminate\Support\Carbon|mixed
     */
    public mixed $downloaded_at;
    protected $fillable = ['document_id', 'user_id', 'downloaded_at'];

    public function document(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
