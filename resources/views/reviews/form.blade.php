@extends('reviews.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>
                    @if (isset($review))
                        Edit
                    @else
                        Add
                    @endif review
                </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('review.index') }}"> Back to Review List</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (isset($review))
        <form action="{{ route('review.update', $review->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
        @else
            <form method="POST" action="{{ route('review.post.create') }}" enctype="multipart/form-data">
    @endif
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="title" value="{{ old('title', $review->title ?? '') }}" class="form-control"
                    placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content</strong>
                <textarea class="form-control" style="min-height: 250px" name="content" placeholder="Content">{{ old('content', $review->content ?? '') }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book category</strong>
                @php
                    if (isset($review)) {
                        $categories = $review
                            ->categories()
                            ->get()
                            ->pluck('category_id')
                            ->all();
                        $oldValue = collect(old('category', collect($categories)));
                    } else {
                        $categories = [];
                        $oldValue = collect(old('category'));
                    }
                @endphp
                @foreach (config('const.tables.reviews.category_names') as $key => $value)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" id="category_{{ $key }}"
                            value="{{ $key }}" @if ($oldValue->contains($key)) checked @endif>
                        <label class="form-check-label" for="category_{{ $key }}">{{ $value }}</label>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image</strong>
                <input type="file" name="image" @error('image') is-invalid @enderror id="inputClientCompany"
                    class="form-control">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary" style="margin-top: 10px">Save</button>
        </div>
    </div>

    </form>
@endsection
