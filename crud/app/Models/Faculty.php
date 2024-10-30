<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "university_id",
        "created_at",
        "updated_at"
    ];

    // Relationship with University
    public function University()
    {
        return $this->belongsTo(University::class);
    }

    public function Majors(){
        return $this->hasMany(Faculty::class,"faculty_id","id");
    }
}
