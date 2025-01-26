@extends('layouts.app')

@section('title', 'List of tasks')

@section('content')
{{-- <div> --}}
    {{-- @if(count($tasks))
        @foreach ($tasks as $task )
            <div>{{$task->title}}</div>
        @endforeach
    @else
        <div>There are no tasks</div>
    @endif --}}
    <div>
        <a href="{{ route('tasks.create') }}">Add Task</a>
    </div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id ])}}">{{$task->title}}</a>
        </div>
    @empty
        <div>There are no tasks</div>
    @endforelse
{{-- </div> --}}
    @if($tasks->count())
        <nav>
            {{$tasks->links()}}
        </nav>
    @endif
@endsection
