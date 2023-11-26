@extends('layouts.app')

@section('header',$task->title)


@section('content')
    <p>{{ $task -> description }}</p>
    @if(isset( $task -> long_description))
        <p>{{ $task -> long_description }}</p>
    @else
        <p>No long description</p>
    @endif
{{--    <div>--}}
        <form action="{{ route('tasks.delete',['task'=>$task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
{{--    </div>--}}
@endsection
