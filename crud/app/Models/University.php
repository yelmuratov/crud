<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class University extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    // Relationship with Faculty
    public  function faculties()
    {
        return $this->hasMany(Faculty::class);
    }
}
