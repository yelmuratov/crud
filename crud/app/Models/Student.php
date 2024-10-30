<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone",
        "group_id",
        "created_at",
        "updated_at",
    ];

    // Relationship with Group
    public function student()
    {
        return $this->belongsTo(Group::class);
    }
}
