@extends('layouts.app')

@section('header','The list of tasks')

@section('content')
<header>
{{--    @if(isset($name))--}}
{{--        <h5>This is index view code by  {{ $name }}  </h5>--}}
{{--    @else--}}
{{--        <h5>This is index view no name</h5>--}}
{{--    @endif--}}
</header>
<nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 decoration-pink-500 underline">Add New Task</a>
</nav>
<div>
    @if(isset($tasks))
        @foreach($tasks as $task)
            <div>
                <a href="{{ route('tasks.detail',['task'=>$task->id]) }}"
                    @class(['text-gray-700','font-bold','line-through' => $task->completed]) >{{ $task->title }}</a>
            </div>
        @endforeach
            @if($tasks -> count())
                <nav class="mt-4">{{ $tasks->links() }}</nav>
            @endif
    @else
        <div>No task here!</div>
    @endif

</div>
{{--<div>--}}
{{--    @if(@isset($tasks))--}}
{{--        @forelse($tasks as $task)--}}
{{--            <div>{{ $task->title }}</div>--}}
{{--        @empty--}}
{{--            <div>There no task</div>--}}
{{--        @endforelse--}}


{{--    @else--}}
{{--        <div>No here</div>--}}
{{--    @endif--}}
{{--</div>--}}
@endsection
