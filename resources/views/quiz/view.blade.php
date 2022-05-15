<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="antialiased">

@if($errors->any())
    <h4>{{$errors->first()}}</h4>
@endif

@php

$isCreateNew = isset($data);

@endphp

<a href="{{url('home')}}"><h2>Back</h2></a>

<form action="{{url('quiz/save')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="@if ($isCreateNew) {{$data->id}} @endif">

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title"
               value="@if ($isCreateNew) {{$data->title}} @endif"
        >
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" id="category" name="category"
               value="@if ($isCreateNew) {{$data->category}} @endif"
        >
    </div>


    <div class="form-group">
        <label for="difficulty">Difficulty</label>
        <select class="form-control" id="difficulty" name="diff">
            <option value="easy" @if ($isCreateNew && $data->difficulty == 'easy') {{"selected"}} @endif>Easy</option>
            <option value="medium" @if ($isCreateNew && $data->difficulty == 'medium') {{"selected"}} @endif>Medium</option>
            <option value="hard" @if ($isCreateNew && $data->difficulty == 'medium') {{"selected"}} @endif>Hard</option>
        </select>
    </div>

    <div class="form-group">
        <h2>Question type</h2>

        <hr>
        <h4>True/False question</h4>
        <div class="form-group">
            <label for="tf">Answer</label>
            <select class="form-control" id="tf" name="tf">
                <option value="">None</option>
                <option value="true" @if ($isCreateNew && $result == 'true') {{"selected"}} @endif>True</option>
                <option value="false" @if ($isCreateNew && $result == 'false') {{"selected"}} @endif>False</option>
            </select>
        </div>

        <hr>
        <h4>Multiple choice question</h4>

        <div class="form-group">
            <label for="a">A</label>
            <input type="text" class="form-control" id="a" name="a"
                   value="@if ($isCreateNew && is_object($result)) {{$result->a}} @endif">
        </div>

        <div class="form-group">
            <label for="b">B</label>
            <input type="text" class="form-control" id="b" name="b"
                   value="@if ($isCreateNew && is_object($result)) {{$result->b}} @endif">
        </div>

        <div class="form-group">
            <label for="c">C</label>
            <input type="text" class="form-control" id="c" name="c"
                   value="@if ($isCreateNew && is_object($result)) {{$result->c}} @endif">
        </div>

        <div class="form-group">
            <label for="d">D</label>
            <input type="text" class="form-control" id="d" name="d"
                   value="@if ($isCreateNew && is_object($result)) {{$result->d}} @endif">
        </div>

        <div class="form-group">
            <label for="ans">Answer</label>
            <input type="text" class="form-control" id="ans" name="ans"
                   value="@if ($isCreateNew && is_object($result)) {{$result->ans}} @endif">
        </div>
    </div>

    <button type="submit">Save</button>
    <br>
    @if ($isCreateNew)
        <a href="{{url('quiz/delete/'. $data->id)}}">Delete</a>
    @endif
</form>


</body>
</html>
