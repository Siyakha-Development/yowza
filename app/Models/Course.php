<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'price',
        'course_image',
        'start_date',
        'published',
    ];

    public function teachers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function getPublishedAttribute($attribute): string
    {
        return [
            0 => 'Inactive',
            1 => 'Active'
        ][$attribute];
    }

    public function scopeOfTeacher($query)
    {
        if (!auth()->user()->isAdmin() || auth()->user()->hasRole('Administrator (can create other users)')) {
            return $query;
        }

        return $query->whereHas('teachers', function($q) {
            $q->where('user_id', auth()->user()->id);
        });
    }


    public function publishedLessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('position')->where('published', 1);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student')->withTimestamps()->withPivot(['rating']);;
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('position');
    }

    public function getRatingAttribute()
    {
        return number_format(DB::table('course_student')->where('course_id', $this->attributes['id'])->average('rating'), 2);
    }

}
