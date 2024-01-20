<div class="w-full max-w-xs">
    <p class="text-blue-600 m-5">Number of Users = {{$numberOfUsers}}</p>
    <form action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input wire:model="name" type="text" placeholder="name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('name')
            <div class="text-red-400">{{$message}}</div>
        @enderror
        <input wire:model="email" type="email" placeholder="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-3">
        <input wire:model="password" type="password" placeholder="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-3">
        <button wire:click.prevent="createNewUser" class="w-full bg-blue-400 mt-2 text-white">create</button>
        @if (session('success'))
            <div class="bg-green-100 text-green-500 mt-2">User Created Succesfully</div>
        @endif
    </form>
    @foreach ($users as $user)
        <ul>
            <li>{{$user->name}}</li>
        </ul>
    @endforeach
    {{$users->links()}}
</div>
