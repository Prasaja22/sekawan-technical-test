@extends('auth.layouts')

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Register</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="wrap">
                <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                  <div class="w-100">
                      <h3 class="mb-4">Sign Up</h3>
                  </div>
              </div>
            <form action="/register" class="signin-form" method="POST">
                @csrf
                  <div class="form-group mt-3">
                      <input name="email" type="email" class="form-control" required value="{{ old('email') }}">
                      <label class="form-control-placeholder" for="username">Email</label>
                  </div>
                  <div class="form-group">
                    <input name="name" type="text" class="form-control" required value="{{ old('name') }}">
                    <label class="form-control-placeholder" for="username">Name</label>
                </div>
                <div class="form-group">
                      <input id="password-field" name="password" type="password" class="form-control" required>
                      <label class="form-control-placeholder" for="password">Password</label>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
                </div>
            <div class="form-group d-md-flex">
            </div>
          </form>
          <p class="text-center">Sudah punya akun? <a href="/">Login</a></p>
        </div>
      </div>
        </div>
    </div>
</div>

@endsection
