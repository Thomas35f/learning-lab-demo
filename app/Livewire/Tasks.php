<?php

namespace App\Livewire;

use App\Enums\CategoryEnum;
use App\Models\Task;
use Livewire\Component;

class Tasks extends Component
{
    public $categories;
    public $chosenCategory;

    public function mount()
    {
        $this->categories = CategoryEnum::toArray();

        // Check query
    }

    //Form - Ajout tâche
    public function submitTask($formData)
    {
        if($formData) {
            $newTask = new Task();
            $newTask->title = $formData['title'];
            $newTask->content = $formData['content'];
            $newTask->category = $formData['category'];
            $newTask->save();

            $this->dispatch('task-created');
        }
    }

    //Form - Delete tâche
    public function deleteTask($id)
    {
        $taskToDelete = Task::whereId($id)->first();
        $taskToDelete->delete();

        $this->dispatch('task-deleted');
    }

    //Filtre - catégorie
    public function filterByCategory($formData)
    {
        if($formData) {
            $this->chosenCategory = $formData['category'];
        }
    }

    public function render()
    {
        return view('livewire.tasks', [
            'tasks' => $this->fetchList(),
        ]);
    }

    public function fetchList()
    {
        if($this->chosenCategory) {
            return Task::where('category', $this->chosenCategory)->orderBy('id', 'desc')->get();
        } else {
            return Task::orderBy('id', 'desc')->get();
        }
    }
}
