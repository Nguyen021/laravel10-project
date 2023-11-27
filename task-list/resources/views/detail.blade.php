@extends('layouts.app')

@section('header',$task->title)


@section('content')
    <div class="mb-4">
        <a href="{{ route('task.index') }}"
            @class(['link'])>
            Back to list</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task -> description }}</p>
    @if(isset( $task -> long_description))
        <p class="mb-4 text-slate-700">{{ $task -> long_description }}</p>
    @else
        <p>No long description</p>
    @endif
    <p class="text-sm mb-4 text-slate-500" >
        Created {{ $task -> created_at->diffForHumans() }} - Updated {{ $task -> updated_at->diffForHumans() }}</p>
    <p class="mb-4">
        @if($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>

    <div class="flex gap-2 ">
        <a href="{{ route('tasks.edit',['task'=>$task->id]) }}"
        class="btn">Update</a>
{{--        <a href="{{ route('tasks.edit',['task'=>$task]) }}" >Update</a>--}}

        <form method="post" action="{{ route('tasks.toggle-complete',['task'=>$task]) }}">
            @csrf
            @method('put')
            <button class="btn">
                Mask task as {{$task->completed ? 'not completed':'completed'}}
            </button>
        </form>

        <form action="{{ route('tasks.delete',['task'=>$task]) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn" type="submit">delete</button>
        </form>
    </div>
@endsection
