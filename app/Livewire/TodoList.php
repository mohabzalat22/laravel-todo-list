<?php

namespace App\Livewire;

use App\Models\todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;
    public $todo;
    public $search;
    public $editingId;
    public $editingTodo;
    public function create()
    {
        $this->validate([
            'todo' => 'required|string|min:5|max:20',
        ]);
        todo::create([
            'todo' => $this->todo,
        ]);
        // reset 
        $this->reset(['todo']);
        session()->flash('success','sucessfully created todo.');
    }

    public function edit($id)
    {
        $this->editingId = $id;
        $this->editingTodo = Todo::find($id)->todo;
    }

    public function update()
    {
        $this->validate([
            'editingTodo' => 'required|string|min:5|max:20',
        ]);
        Todo::find($this->editingId)->update([
            'todo' => $this->editingTodo
        ]);
        $this->cancel();
    }

    public function cancel()
    {
        $this->reset('editingId','editingTodo');
    }
    public function toggle($id)
    {
        $record = Todo::where('id',$id);
        $record->update([
            'done' => !Todo::where('id',$id)->value('done'),
        ]);
    }

    public function delete($id)
    {
        Todo::find($id)->delete();

    }

    public function render()
    {
        $todos = Todo::where('todo','like',"%{$this->search}%")->latest()->paginate(5);   
        return view('livewire.todo-list',[
            'todos' => $todos
        ]);
    }
}
