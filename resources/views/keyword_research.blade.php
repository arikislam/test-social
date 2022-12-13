
@extends('layout')

@section('title', 'Keyword Input Form')

@section('content')
<h1>Keyword Input Form</h1>
<form action="/keywords" method="POST">
    @csrf
    <label for="keywords">Enter your keywords:</label><br>
    <input type="text" id="keywords" name="keywords"><br>
    <input type="submit" value="Submit">
</form>

@if (isset($response))
@foreach ($response as $item)
    <p>{{ $item }}</p>
    <form action="/calendar/create" method="POST">
        @csrf
        <input type="hidden" name="content" value="{{ $item }}">
        <input type="hidden" name="keyword_id" value="{{ $keyword_id }}">

        <input type="submit" value="Add to Content Calendar">
    </form>
@endforeach
@endif
@endsection