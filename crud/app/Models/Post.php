<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;
use App\Models\View;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    // Helper to count likes and dislikes
    public function likesCount()
    {
        return $this->likes()->where('liked', true)->count();
    }

    public function dislikesCount()
    {
        return $this->likes()->where('liked', false)->count();
    }

    public function viewsCount()
    {
        return $this->views()->count(); // Or use a `views` column if you opt for cumulative views
    }
}
