@extends('base')

@section('title', 'Update a Task')

@section('content')
    <h1>Edit task</h1>
    <div>
        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label for="title">Task title</label>
                <input class="form-control" name="title" value="{{ old('title', $task->title) }}"/>
                @error("title")
                {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Task description</label>
                <input class="form-control" name="description" value="{{ old('title', $task->description) }}"/>
                @error("description")
                {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-success">Edit task</button>
            </div>
        </form>
    </div>
@endsection
