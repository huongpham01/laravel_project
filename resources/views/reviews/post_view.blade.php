@extends('layouts.app')

@section('title', 'Post - ' . $post->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Post {{ $post->title }}</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-2">
                                <p>Title</p>
                            </div>
                            <div class="col-md-4">
                                {{ $post->title }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <p>Contents</p>
                            </div>
                            <div class="col-md-4">
                                {{ $post->contents }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <p>Created</p>
                            </div>
                            <div class="col-md-4">
                                {{ $post->created_at->format('Y-m-d H:i:s') }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <p>Updated</p>
                            </div>
                            <div class="col-md-4">
                                {{ $post->updated_at->format('Y-m-d H:i:s') }}
                            </div>
                        </div>

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('posts/' . $post->id) }}"
                            onsubmit="return confirm('Are you sure you wish to delete this record?');">
                            @if ($post->id)
                                {{ method_field('DELETE') }}
                            @endif
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
