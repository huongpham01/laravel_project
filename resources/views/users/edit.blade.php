<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Edit</b></a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Edit user {{ $user->name }} information</p>

                <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                            placeholder="Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color: red">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color: red">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>

</html>
