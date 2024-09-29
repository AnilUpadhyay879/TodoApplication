{{--@extends('base')--}}

{{--@section('title', 'Create Task')--}}

{{--@section('create')--}}
<h4 class="mb-4 text-primary">New task</h4>
<div class="border border-success" style="border-radius: 45px; padding: 25px;">
    <form method="POST" action="/create">
        @csrf
        <div class="form-group">
            <label for="title">Task title</label>
            <input type="text" id="title" name="title" class="form-control"/>
            @error("title")
            {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Task description</label>
            <input type="text" id="description" name="description" class="form-control"/>
            @error("description")
            {{ $message }}
            @enderror
        </div>
        <div class="mt-3 mb-2 form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-sm btn-success">Create task</button>
        </div>
    </form>
</div>
{{--@endsection--}}
