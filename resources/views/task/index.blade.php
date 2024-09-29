@extends('base')

@section('title', 'Homepage')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row mt-5 mb-5">

        <div class="col-9 row border-top"
             style="background-color: lightslategrey; border-radius: 45px; padding: 25px;">
            <h1 class="mb-4">{{ 'Today\'s task' }}@if($todayTasks->count() > 1)s ({{ $todayTasks->count() }})
                @endif - {{ now()->format('d/m/Y') }}</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tache</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($todayTasks as $task)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td> {{ date('d-m-Y ', strtotime($task->created_at)) }}</td>
                        <td>
                            <div style="display: flex;">
                                <form id="editForm" action="{{ route('task.edit', ['task' => $task->id]) }}"
                                      method="GET" style="margin-right: 5px;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                </form>
                                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-3 row border-top"
             style="background-color: lightsteelblue; border-radius: 45px; padding: 25px; margin-left: 15px">
            @include('task.create')
        </div>
    </div>
@endsection
