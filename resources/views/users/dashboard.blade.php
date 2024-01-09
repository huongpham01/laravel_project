        <!DOCTYPE html>
        <html lang="en">

        <head>
            @include('layout.header')
            <style scoped>
                ul {
                    list-style-type: none;
                    margin: 0 !important;
                    padding: 0;
                    overflow: hidden;
                    background-color: #e2d7d7;
                }

                li {
                    float: left;
                }

                ul li a {
                    display: block;
                    color: black;
                    text-align: center;
                    padding: 14px 16px;
                    text-decoration: none;
                }

                ul li a:hover {
                    background-color: #111;
                    text-decoration: none;
                    color: pink;
                }

                .move-left {
                    position: absolute;
                    right: 20px;
                    top: 10px;
                }

                .button {
                    position: absolute;
                    right: 20px;
                    top: 10px;
                    background-color: red;
                    color: white;
                    border-radius: 5px;
                }
            </style>
        </head>

        <body class="hold-transition sidebar-mini">
            <nav>
                <ul>
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li><a href="{{ route('review.index') }}">Reviews</a></li>
                    <li><a href="#">Contact</a></li>
                    <li style="position: absolute; right: 0;">
                        <a href="{{ route('user.get.logout') }}">Logout</a>
                    </li>

                </ul>
            </nav>
            <div class="wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage Users</h3>

                                <div class="card-tools">
                                    <form method="GET" action="{{ route('user.index') }}">
                                        <input type="text" name="search">

                                        <button type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>@sortablelink('id', 'ID')</th>
                                            <th>@sortablelink('name', 'Name')</th>
                                            <th>@sortablelink('email', 'Email')</th>
                                            <th>@sortablelink('status', 'Status')</th>
                                            <th>@sortablelink('created_at', 'Create At')</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
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
                                                    <!-- Edit User -->
                                                    <a href="{{ route('user.edit', ['id' => $user->id]) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <!-- Delete User -->
                                                    <form action="{{ route('user.delete', ['id' => $user->id]) }}"
                                                        method="post" style="display:inline;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Pagination --}}
                <nav aria-label="Page navigation example">
                    <ul class="pagination" style="background-color: white">
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
                                <li class="page-item active" aria-current="page"><span
                                        class="page-link">{{ $i }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $users->url($i) }}">{{ $i }}</a></li>
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



            </div>

            {{-- notication  --}}
            @if (session('success'))
                <div id="notification" class="alert alert-success">
                    {{ session('success') }} {{ session('userId') }}
                </div>

                <script>
                    // Display notification in 5s
                    document.addEventListener('DOMContentLoaded', function() {
                        var notification = document.getElementById('notification');

                        setTimeout(function() {
                            notification.style.display = 'none';
                        }, 5000);
                    });
                </script>
            @endif


        </body>
        @include('layout.footer')

        </html>
