@extends('layouts.app')

@section('content')
<header>
    @if(isset($name))
        <h5>This is index view code by {!! $name !!} - {{ $name }}  </h5>
    @else
        <h5>This is index view no name</h5>
    @endif

</header>

<div>
    @if(isset($tasks))
        @foreach($tasks as $task)
            <div>
                <a href="{{ route('tasks.detail',['id'=>$task->id]) }}">{{ $task->title }}</a>
            </div>
        @endforeach
    @else
        <div>No task here!</div>
    @endif


</div>
<div>
    @if(@isset($tasks))
        @forelse($tasks as $task)
            <div>{{ $task->title }}</div>
        @empty
            <div>There no task</div>
        @endforelse
    @else
        <div>No here</div>
    @endif
</div>
@endsection
