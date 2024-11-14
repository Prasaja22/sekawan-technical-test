@extends('auth.layouts')

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Login</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="wrap">
                <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                  <div class="w-100">
                      <h3 class="mb-4">Sign In</h3>
                  </div>
              </div>
              <form action="/login" class="signin-form" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group mt-3">
                    <input name="email" type="email" class="form-control" required>
                    <label class="form-control-placeholder" for="username">Email</label>
                    <!-- Tampilkan pesan error untuk email -->
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password-field" name="password" type="password" class="form-control" required>
                    <label class="form-control-placeholder" for="password">Password</label>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <!-- Tampilkan pesan error untuk password jika dibutuhkan -->
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                </div>
            </form>

          <p class="text-center">Belum punya akun? <a href="/register">Register</a></p>
        </div>
      </div>
        </div>
    </div>
</div>

@endsection
