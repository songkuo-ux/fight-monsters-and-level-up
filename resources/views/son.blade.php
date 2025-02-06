@extends('parent')

@section('title','Page Title')

@section('sidebar')
    @parent

    <p>sidebar</p>
@endsection

@section('content')
    <p>content</p>
    <p>{{$name}}</p>
@endsection
