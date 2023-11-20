<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        @if(isset($name))
            <h5>This is index view code by {{ $name }}</h5>
        @else
            <h5>This is index view no name</h5>
        @endif

    </header>

    <div>
        @if(count($tasks))
            @foreach($tasks as $task)
                <div>
                    <a href="{{ route('tasks.detail',['id'=>$task->id]) }}">{{ $task->title }}</a>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
