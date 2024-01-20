<div class="w-full max-w-md mx-auto mt-5">
    <form action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border-2 border-t-blue-400">
        <h3 class="text-xl font-medium text-slate-500">Create New Todo</h3>
        <input wire:model="todo" type="text" placeholder="Todo.." class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-3">
        @error('todo')
            <div class="text-sm text-red-400"> {{$message}} </div>
        @enderror
        <button wire:click.prevent="create" class="bg-blue-400 text-white py-1 px-2 mt-2 hover:bg-blue-500">Create +</button>
        @if (session('success'))
            <div class="text-sm text-green-500 mt-2">{{session('success')}}</div>
            
        @endif
    </form>   
    <form action="">
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="search" class="appearance-none border border-blue-400 border-b-0 rounded-t-lg w-xs block py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ">
    </form>
    <ul class="border-t-2 border-t-blue-300">
        @foreach ($todos as $todo)
            <li wire:key = {{$todo->id}} class=" text-slate-600 ms-1 border-2 border-blue-200 rounded m-1 p-1"> 
                <div class="">
                    <div class="flex justify-between">
                        <div class="text-lg">
                            @if ($todo->done)
                                <input wire:click="toggle({{$todo->id}})" type="checkbox" name="" id="" class="inline-block" checked>
                            @else
                                <input wire:click="toggle({{$todo->id}})" class="mr-2" type="checkbox">
                            @endif
    
                            @if ($editingId == $todo->id)
                                <input wire:model="editingTodo" type="text" placeholder="edit" class="appearance-none border rounded w-xs block mx-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
                            @else    
                                {{$todo->todo}}
                            @endif
                        </div>
                        <div class="mt-1">
                            <button wire:click="edit({{$todo->id}})" class="bg-blue-400 text-white p-1 hover:bg-blue-500"><svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg></button>
                            <button wire:click="delete({{$todo->id}})" class="bg-red-300 text-white p-1 hover:bg-red-400"><svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg></button>
                        </div>
                    </div>
                    <div class="text-sm">{{$todo->created_at}}</div>
                    @error('editingTodo')
                        <div class="text-sm text-red-400"> {{$message}} </div>
                    @enderror
                    @if ($editingId == $todo->id)
                        <div class="mt-2 ms-1">
                            <button wire:click="update" class="bg-blue-400 hover:bg-blue-500 text-white p-1">save</button>
                            <button wire:click="cancel" class="bg-red-300 hover:bg-red-400 text-white p-1">cancel</button>
                        </div> 
                    @endif
               </div>
               
            </li>
        @endforeach
        <div class="">
            {{$todos->links()}}
        </div>
    </ul>
</div>
