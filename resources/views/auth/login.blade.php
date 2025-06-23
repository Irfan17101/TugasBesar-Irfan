@extends('layouts.guest')

@section('content')
<section class="bg-light py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-6">
        <div class="card border border-light-subtle rounded-4 shadow-sm">
          <div class="row g-0">
            <div class="col-md-6">
              <div class="card-body p-4 p-md-5">
                <h2 class="fs-6 mb-4 text-center">Log in</h2>
                <form action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember">Keep me logged in</label>
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Log in now</button>
                  </div>
                  <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('password.request') }}">Forgot password</a>
                  </div>
                </form>

                <hr class="my-4">
                <div class="text-center">
                  <p class="mb-2">Or sign in with</p>
                  <div class="d-flex justify-content-center gap-3">
                    <a class="btn btn-outline-secondary" href="#"><i class="zmdi zmdi-google"></i> Google</a>
                    <a class="btn btn-outline-secondary" href="#"><i class="zmdi zmdi-facebook"></i> Facebook</a>
                    <a class="btn btn-outline-secondary" href="#"><i class="zmdi zmdi-twitter"></i> Twitter</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 bg-light d-flex flex-column justify-content-center align-items-center text-center p-4">
              <h5>Welcome!</h5>
              <img src="{{ asset('template/img/logo.jpg') }}" alt="Logo" class="img-fluid my-3" style="max-width: 100px;">
              <p class="text-muted">Not a member yet? <a href="{{ route('register') }}">Register now</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
