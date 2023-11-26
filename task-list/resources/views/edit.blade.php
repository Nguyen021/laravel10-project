@extends('layouts.app')

@section('content')
   @include('commons.form',['task' =>$task])
@endsection
