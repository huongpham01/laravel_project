<!DOCTYPE html>
<html>
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

<head>
    <title>Laravel 10 CRUD Application - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li><a href="{{ route('review.index') }}">Reviews</a></li>
            <li><a href="{{ route('user.get.logout') }}">Logout</a></li>
            <li class="move-left">
                <div class="card-tools">
                    <form method="GET" action="{{ route('user.index') }}">
                        <input type="text" name="search" value="{{ request()->get('search') }}">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </li>

        </ul>
    </nav>



    <div class="container">
        @yield('content')
    </div>


</body>

</html>
