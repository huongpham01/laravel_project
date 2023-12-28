        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!-- /.card-header -->
            @include('layout.header')
        </head>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage Users</h3>

                                <div class="card-tools">
                                    {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div> --}}
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Create At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->status_name }}</td>
                                                {{-- <td>{{ $user->status }}</td> --}}
                                                <td>{{ $user->created_at }}</td>
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
            </div>
        </body>
        @include('layout.footer')

        </html>
