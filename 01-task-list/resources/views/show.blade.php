@extends('layouts.app')

@section('title', $task->title)

@section('content')
<p>{{$task->description}}</p>

@if($task->long_description)
    <p>{{$task->long_description}}</p>
@endif

<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

<p>{{$task->completed ? 'Completed' : 'Incomplete'}}</p>

<div>
    <a href="{{route('tasks.edit', ['task' => $task])}}">Edit</a>
</div>
{{-- Se puede pasar solo la task ya que laravel usa la clave primaria por defecto, si no le podemos indicar de igual manera --}}

<div>
    <form action="{{route('tasks.toggle-complete', ['task' =>$task])}}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">
            Masrk as {{$task->completed ? 'Incomplete' : 'Complete'}}
        </button>
    </form>
</div>

<div>
    <form
        action="{{route('tasks.destroy', ['task' => $task->id])}}"
        method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endsection
