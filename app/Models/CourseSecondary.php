<?php

namespace App\Models;

use App\Models\OldCourses\MdlCourseCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CourseSecondary extends Model
{
    use HasFactory;

    // Specify the connection
    protected $connection = 'yowzaetjub_db5';

    // Specify the table name
    protected $table = 'mdl_course';

    public function secondary_category()
    {
        return $this->belongsTo(MdlCourseCategory::class, 'category', 'id');
        // Adjust 'category' and 'id' based on your actual column names
    }
}
