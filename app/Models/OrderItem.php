<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Course;
class OrderItem extends Model
{
    protected $fillable = ['user_id','order_id','course_id'];

    use HasFactory;


    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'id', 'course_id');
    }


}
