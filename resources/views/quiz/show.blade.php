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

<a href="{{url('quiz/create')}}"><h2>Create New Question</h2></a>


<form action="{{url('home')}}" method="get">
    <h3>Filter</h3>
    <div class="form-group">
        <label for="cat">Category</label>
        <input type="text" class="form-control" id="cat" name="cat">
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="type">
            <option value="">None</option>
            <option value="tf">True/False</option>
            <option value="mc">Multiple Choice</option>
        </select>
    </div>
    <div class="form-group">
        <label for="diff">Difficulty</label>
        <select class="form-control" id="diff" name="diff">
            <option value="">None</option>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
    </div>
    <button type="submit">Filter</button>
</form>
<br>
<hr>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Difficulty</th>
        <th scope="col">Category</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $q)
        <tr>
            <th scope="row">{{$q->id}}</th>
            <td>{{$q->title}}</td>
            <td>{{$q->difficulty}}</td>
            <td>{{$q->category}}</td>
            <td><a href="{{url("quiz/edit/" . $q->id)}}">Edit</a></td>
        </tr>
    @endforeach

    </tbody>
</table>

<br>

<a href="{{url('quiz/create')}}"></a>

</body>
</html>
