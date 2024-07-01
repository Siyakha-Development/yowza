<?php

namespace App\Models\OldCourses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdlCourseCategory extends Model
{
    use HasFactory;
    protected $connection = 'yowzaetjub_db5';

    protected $table = 'mdl_course_categories';

    public $incrementing = false;

    protected $primaryKey = 'id'; 

    public $timestamps = false;

    
}
