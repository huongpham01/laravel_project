@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Posts</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-1">
                                <a href="{{ url('posts/create') }}" class="btn btn-primary">Add</a>
                            </div>
                        </div>

                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Categories</th>
                                    <th>Image</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($posts as $row)
                                    <tr>
                                        <td class="text-center">{{ $row->id }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $row->updated_at->format('Y-m-d') }}</td>
                                        <td><a href="{{ url('posts/' . $row->id . '/edit') }}">Edit</a></td>
                                        <td><a href="{{ url('posts/' . $row->id) }}">View</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
