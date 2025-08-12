@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh; position: relative;">

    <!-- Back Button -->
    <a href="{{ url('/') }}" class="btn btn-outline-secondary position-absolute" style="top: 20px; left: 20px; z-index: 10;">
        ← Back to Home
    </a>

    <div class="card shadow-lg p-5 border-0" style="max-width: 550px; width: 100%; border-radius: 20px; background-color: #fdfdfd;">
        <h2 class="text-center mb-4" style="font-weight: 700; color: #2c3e50;">Create Your Account</h2>
        <p class="text-center mb-4" style="color: #7f8c8d;">Join us and explore premium events</p>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label" style="color: #34495e; font-weight: 600;">Full Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    required
                    style="border-radius: 12px; padding: 12px; font-size: 1rem;"
                >
            </div>

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
                    Register
                </button>
            </div>

            <p class="text-center mt-3" style="color: #7f8c8d;">Already have an account?
                <a href="/login" style="color: #e67e22; font-weight: 600;">Login here</a>
            </p>
        </form>
    </div>
</div>
@endsection
