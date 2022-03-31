@extends('auth.layout', [
    'title' => 'Login'
])

@section('content')
    <div class="row m-0">
        <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
            <img src="{{ asset('app-assets/images/pages/login.png') }}" alt="branding logo">
        </div>
        <div class="col-lg-6 col-12 p-0">
            <div class="card rounded-0 mb-0 px-2">
                <div class="card-header pb-1">
                    <div class="card-title">
                        <h4 class="mb-0">Login</h4>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body pt-1">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <fieldset class="form-label-group position-relative has-icon-left">
                                <input type="email" name="email" class="form-control" id="user-email" value="{{ old('email') }}" placeholder="Email" required>
                                <div class="form-control-position">
                                    <i class="feather icon-user"></i>
                                </div>
                                <label for="user-email">Email</label>
                            </fieldset>

                            <fieldset class="form-label-group position-relative has-icon-left">
                                <input type="password" name="password" class="form-control" id="user-password" placeholder="Password" required>
                                <div class="form-control-position">
                                    <i class="feather icon-lock"></i>
                                </div>
                                <label for="user-password">Password</label>
                            </fieldset>
                            <hr>
                            <a class="btn btn-primary" href="{{ route('menu') }}">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                        </form>
                    </div>
                </div>
                <!-- <div class="container">
                    <a href="{{ 'register' }}">Registrasi / Daftar</a>
                </div> -->
                <div class="login-footer">
                    <div class="divider">
                        <div class="divider-text">Copyright {{ date('Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
