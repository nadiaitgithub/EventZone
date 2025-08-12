@extends('layouts.app')

@section('content')
<div class="container position-relative d-flex justify-content-center align-items-center" style="min-height: 80vh;">

    <!-- Back Button -->
    <a href="{{ url('/') }}" class="btn btn-outline-secondary position-absolute" style="top: 20px; left: 20px; z-index: 10;">
        ← Back to Home
    </a>

    <div class="card shadow-lg p-5 border-0" style="max-width: 500px; width: 100%; border-radius: 20px; background-color: #fdfdfd;">
        <h2 class="text-center mb-4" style="font-weight: 700; color: #2c3e50;">Welcome Back</h2>
        <p class="text-center mb-4" style="color: #7f8c8d;">Please login to your account</p>

        {{-- Success or Error Alerts --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label" style="color: #34495e; font-weight: 600;">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    required
                    style="border-radius: 12px; padding: 12px; font-size: 1rem;"
                >
            </div>

            <div class="mb-4">
                <label for="password" class="form-label" style="color: #34495e; font-weight: 600;">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    required
                    style="border-radius: 12px; padding: 12px; font-size: 1rem;"
                >
            </div>

            <div class="d-grid mb-3">
                <button type="submit"
                        class="btn"
                        style="background: linear-gradient(135deg, #307c78, #0e1026); color: white; font-weight: bold; font-size: 1.1rem; border-radius: 30px; padding: 12px;">
                    Login
                </button>
            </div>

            <p class="text-center mt-3" style="color: #7f8c8d;">Don't have an account?
                <a href="/register" style="color: #e67e22; font-weight: 600;">Register</a>
            </p>
        </form>
    </div>
</div>
@endsection
