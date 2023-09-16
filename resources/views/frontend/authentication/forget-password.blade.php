@extends('frontend.authentication.master')

@section('title', 'Forgot Password')

@section('content')
    <form action="{{ route('forget.password') }}" method="post"
        class="authentication-form px-lg-5 forgot-form needs-validation" novalidate>
        @csrf
        <div class="authentication-form-header">
            <a href="{{ route('frontend.home') }}" class="logo">
                <img src="{{ asset('assets/images/logo/logo.png') }}" width="200px" alt="brand-logo">
            </a>
            <h3 class="form-title">Forgot Password?</h3>
            <p class="form-des">Please enter the email you use to sign in.</p>
        </div>
        <div class="authentication-form-content">
            <div class="row g-4">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email"
                            autocomplete="off" name="email" required>
                        <div class="invalid-feedback">
                            enter a valid email address
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="create-account-btn w-100">Request password reset</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="authentication-form-footer">
            <p>Back to <a href="{{ route('login') }}">Log in </a></p>
        </div>
    </form>
@endsection
