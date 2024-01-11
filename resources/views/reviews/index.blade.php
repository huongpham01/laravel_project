@extends('reviews.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 style="text-align: center; margin: 20px 0">Review List</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" style="margin: 10px 0 " href="{{ route('review.get.create') }}"> Create New
                    Review</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr style="text-align: center; vertical-align: middle;">
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink('title', 'Title')</th>
            <th>@sortablelink('content', 'Content')</th>
            <th>@sortablelink('category', 'Book category')</th>
            <th>Image</th>
            <th>@sortablelink('status', 'Status')</th>
            <th>Action</th>
        </tr>
        @foreach ($reviews as $review)
            <tr style="text-align: center; vertical-align: middle;">
                <td>{{ $review->id }}</td>
                <td>{{ $review->title }}</td>
                <td>{{ $review->content }}</td>
                <td>
                    @if (count($review->categories) !== 0)
                        @foreach ($review->categories as $category)
                            {{ config('const.tables.reviews.category_names')[$category->category_id] }}
                            <br>
                        @endforeach
                    @endif
                </td>
                <td>
                    @if ($review->image)
                        {{--  return asset(Storage::url(/images/ . $review->image)); --}}
                        <img src="{{ asset('storage/images/' . $review->image) }}" style="height: auto;width:90px;">
                    @else
                        <span>No image found!</span>
                    @endif
                </td>

                {{-- <td>{{ $review->review_id }}</td> --}}
                <td>{{ config('const.tables.reviews.status_names')[$review->status] }}</td>
                <td>
                    <!-- View Review -->
                    <a href="{{ route('review.view', ['id' => $review->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <!-- Edit Review -->
                    <a href="{{ route('review.edit', ['id' => $review->id]) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <!-- Delete -->
                    <form action="{{ route('review.delete', ['id' => $review->id]) }}" method="post"
                        style="display:inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{-- Pagination --}}
    <nav aria-label="Page navigation example">
        <ul class="pagination" style="background-color: white; display: flex; justify-content: center;">
            {{-- Previous Page Link --}}
            @if ($reviews->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $reviews->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($i = 1; $i <= $reviews->lastPage(); $i++)
                @if ($i == $reviews->currentPage())
                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $reviews->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($reviews->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $reviews->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>

    {{-- {!! $reviews->links() !!} --}}
@endsection
