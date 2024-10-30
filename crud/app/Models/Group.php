<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Major;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "major_id",
        "created_at",
        "updated_at",
    ];


    // Relationship with Major
    public function majors()
    {
        return $this->belongsTo(Major::class,'major_id','id');
    }   

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

