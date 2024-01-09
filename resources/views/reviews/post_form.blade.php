@extends('layouts.app')

@section('title', 'Post - ' . ($post->id ? $post->title : 'New Post'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Post</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                            action="{{ $post->id ? url('posts/' . $post->id) : url('posts') }}">
                            @if ($post->id)
                                {{ method_field('PUT') }}
                            @endif
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Title</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('title', $post->title) }}">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Contents</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="contents">{!! htmlentities(old('contents', $post->contents)) !!}</textarea>

                                    @if ($errors->has('contents'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contents') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Save
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
