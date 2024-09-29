@extends('base')

@section('title', 'Homepage')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="row border-top" style="background-color: lightslategrey; border-radius: 45px; padding: 25px;">
            <div class="col-9">
                <h1 class="mb-4">{{ 'All your past task' }}@if($tasks->count() > 1)
                        s ({{$tasks->count() }})
                    @endif</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tache</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <th scope="row">{{ $loop->index + 1}}</th>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td> {{ date('d-m-Y ', strtotime($task->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
@endsection
