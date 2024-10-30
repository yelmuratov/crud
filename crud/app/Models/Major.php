<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "faculty_id",
        "created_at",
        "updated_at",
    ];

    // Relationship with Faculty
    public function faculties()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
