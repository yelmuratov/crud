<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostInteractions extends Component
{
    public $post;
    public $likesCount;
    public $dislikesCount;
    public $viewsCount;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->likesCount = $post->likes()->where('liked', true)->count();
        $this->dislikesCount = $post->likes()->where('liked', false)->count();
        $this->viewsCount = $post->views()->count();

        // Increment view count when the component is mounted (if not previously counted)
        if (Auth::check()) {
            $this->incrementView();
        }
    }

    public function like()
    {
        if (Auth::check()) {
            $this->post->likes()->updateOrCreate(
                ['user_id' => Auth::id()],
                ['liked' => true]
            );
            $this->updateCounts();
        }
    }

    public function dislike()
    {
        if (Auth::check()) {
            $this->post->likes()->updateOrCreate(
                ['user_id' => Auth::id()],
                ['liked' => false]
            );
            $this->updateCounts();
        }
    }

    public function incrementView()
    {
        if (Auth::check()) {
            $this->post->views()->firstOrCreate(
                ['user_id' => Auth::id()]
            );
            $this->viewsCount = $this->post->views()->count();
        }
    }

    private function updateCounts()
    {
        $this->likesCount = $this->post->likes()->where('liked', true)->count();
        $this->dislikesCount = $this->post->likes()->where('liked', false)->count();
    }

    public function render()
    {
        return view('livewire.post-interactions');
    }
}
