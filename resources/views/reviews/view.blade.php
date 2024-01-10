<!DOCTYPE html>
<html lang="en">

<head>
    <title>Review detail</title>
    @include('layout.header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home.index') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0px">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid container">
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <h1>Review detail</h1>
                        </div>
                        <div class="col-sm-9" style="display: flex; justify-content: flex-end;">
                            <div class="col-md-3">
                                <a href="{{ route('review.index') }}" class="btn btn-primary btn-block mb-3">Back to
                                    Review list</a>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid container">
                    <div class="card card-primary card-outline" style="min-height: 800px">
                        <div class="card-header">
                            <h3 class="card-title"> {{ $review->title }}</h3>
                        </div>
                        <div class="card-body p-3">

                            <div class="mailbox-read-message">
                                <label for="content">Content:</label>
                                <p>{{ $review->content }}</p>
                            </div>
                            <div class="mailbox-read-message">
                                <label for="content">Categories:</label><br>
                                @if ($review->categories->isNotEmpty())
                                    @foreach (config('const.tables.reviews.category_names') as $key => $value)
                                        <p class="form-check-label" for="category_{{ $key }}">
                                            {{ $value }}</p>
                                    @endforeach
                                @else
                                    <p>No category selected</p>
                                @endif
                            </div>

                            <div class="mailbox-read-message">
                                <label for="content">Image:</label><br>
                                <img src="{{ asset('storage/images/' . $review->image) }}" alt="Review Image"
                                    style="height: 300px;width:350px;">
                            </div>
                            <div class="mailbox-read-message">
                                <label for="content">Created by: </label>
                                <p>{{ $review->user->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i>
                            Previous</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i>
                            Next</button>
                    </div>
                </div>
            </section>
        </div>

        <!-- jQuery -->
        @include('layout.footer')

</html>
