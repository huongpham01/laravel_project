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
            <li><a href="{{ route('user.post.login') }}">Login</a></li>
            <li><a href="#">Contact</a></li>
            <li class="move-left">
                <div class="card-tools">
                    <form method="GET" action="{{ route('review.index') }}">
                        <input type="text" name="search">

                        <button type="submit">Search</button>
                    </form>
                </div>
            </li>

        </ul>
    </nav>
    <div class="wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Reviews list</h3>
                        <form method="GET" action="{{ route('review.get.create') }}">
                            <button type="submit" class="button">Create review post</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id', 'ID')</th>
                                    <th>@sortablelink('title', 'Title')</th>
                                    <th>@sortablelink('content', 'Content')</th>
                                    <th>@sortablelink('category', 'Book category')</th>
                                    <th>@sortablelink('image', 'Image')</th>
                                    <th>@sortablelink('created_by', 'Author')</th>
                                    <th>@sortablelink('status', 'Status')</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->title }}</td>
                                        <td>{{ $review->content }}</td>
                                        <td>{{ $review->category }}</td>
                                        <td>{{ $review->image }}</td>
                                        <td>{{ $review->created_by }}</td>
                                        <td>{{ $review->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <!-- View Review -->
                                            <a href="{{ route('review.show', ['id' => $review->id]) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <!-- Edit Review -->
                                            <a href="{{ route('review.edit', ['id' => $review->id]) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <!-- Delete Review -->
                                            <form action="{{ route('review.destroy', ['id' => $review->id]) }}"
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
        </nav>



    </div>

    {{-- notication  --}}
    @if (session('success'))
        <div id="notification" class="alert alert-success">
            {{ session('success') }} {{ session('reviewId') }}
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
