@extends('layouts.app')

@section('title', $task->title)

@section('content')

<div class="mb-4">
    <a href="{{ route('tasks.index')}}"
        class="link"
    >
     🔙 Go back to the task list
    </a>
</div>

<p class="mb-4 text-slate-700">{{$task->description}}</p>

@if($task->long_description)
    <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
@endif

<p class="mb-4 text-sm text-slate-500">
    Created {{$task->created_at->diffforHumans()}} · Updated {{$task->updated_at->diffForHumans()}}
</p>

<p class="mb-4">
    <span @class([
        'text-green-500' => $task->completed,
        'text-red-500' => !$task->completed,
        'mb-4 font-medium'
    ])>
        {{$task->completed ? 'Completed' : 'Incomplete'}}
    </span>
</p>

<div class="flex gap-4">
    <a
        href="{{route('tasks.edit', ['task' => $task])}}"
        class="btn"
    >Edit</a>

{{-- Se puede pasar solo la task ya que laravel usa la clave primaria por defecto, si no le podemos indicar de igual manera --}}


    <form action="{{route('tasks.toggle-complete', ['task' =>$task])}}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">
            Masrk as {{$task->completed ? 'Incomplete' : 'Complete'}}
        </button>
    </form>

    <form
        action="{{route('tasks.destroy', ['task' => $task->id])}}"
        method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">Delete</button>
    </form>
</div>
@endsection
