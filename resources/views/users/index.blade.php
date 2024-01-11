@extends('users.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 style="text-align: center; margin: 20px 0">User List</h1>
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
            <th>@sortablelink('name', 'Name')</th>
            <th>@sortablelink('email', 'Email')</th>
            <th>@sortablelink('status', 'Status')</th>
            <th>@sortablelink('created_at', 'Create At')</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $user)
            <tr style="text-align: center; vertical-align: middle;">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {{-- @dd(config('const.tables.users.status')) --}}
                    {{-- {{ config('const.tables.users.status_names')[$user->status] }} --}}

                    @if ($user->status !== null)
                        {{ config('const.tables.users.status_names')[$user->status] }}
                    @else
                        Unknown Status
                    @endif
                </td>

                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                <td>
                    <!-- View user -->
                    {{-- <a href="{{ route('user.view', ['id' => $user->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i> View
                    </a> --}}
                    <!-- Edit user -->
                    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <!-- Delete -->
                    <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="post" style="display:inline;">
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
        <ul class="pagination" style="background-color: white; display: flex; justify-content: center">
            {{-- Previous Page Link --}}
            @if ($users->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($i = 1; $i <= $users->lastPage(); $i++)
                @if ($i == $users->currentPage())
                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($users->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>

    {{-- {!! $users->links() !!} --}}
@endsection
