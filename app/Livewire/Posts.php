<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Http\Request;

class Posts extends Component
{
    public $category;

    public function mount(Request $request)
    {
        if ($request->has('category')) {
            $this->category = $request->category;
        }
    }

    public function render()
    {
        return view('livewire.posts', [
            'posts' => $this->fetchList(),
        ]);
    }

    public function fetchList()
    {
        return Post::get();
    }
}
