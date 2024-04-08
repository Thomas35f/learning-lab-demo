<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Task;
use Livewire\Component;
use Illuminate\Http\Request;

class Add extends Component
{
    //Formulaire envoyé
    public function submitTask($formData)
    {
        if($formData) {
            $newTask = new Task();
            $newTask->title = $formData['title'];
            $newTask->content = $formData['content'];
            $newTask->category = $formData['category'];
            $newTask->save();

            $this->dispatch('post-created');
        }
    }

    public function render()
    {
        return view('livewire.add-task');
    }
}
