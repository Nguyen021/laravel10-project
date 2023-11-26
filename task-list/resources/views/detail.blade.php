@extends('layouts.app')

@section('header',$task->title)


@section('content')
    <p>{{ $task -> description }}</p>
    @if(isset( $task -> long_description))
        <p>{{ $task -> long_description }}</p>
    @else
        <p>No long description</p>
    @endif
    <p>{{ $task -> created_at }}</p>
    <p>{{ $task -> updated_at }}</p>
    <p>
        @if($task->completed)
            Completed
        @else
            Not Completed
        @endif
    </p>
    <div>
        <a href="{{ route('tasks.edit',['task'=>$task->id]) }}" >Update</a>
{{--        <a href="{{ route('tasks.edit',['task'=>$task]) }}" >Update</a>--}}
    </div>
    <div>
    <form method="post" action="{{ route('tasks.toggle-complete',['task'=>$task]) }}">
        @csrf
        @method('put')
        <button>
            Mask task as {{$task->completed ? 'not completed':'completed'}}
        </button>
    </form>
    </div>
    <div>
        <form action="{{ route('tasks.delete',['task'=>$task]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    </div>
@endsection
