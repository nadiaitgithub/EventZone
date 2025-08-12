@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-5" style="font-family: 'Roboto', sans-serif; font-size: 2.2rem; font-weight: bold; color: #2f2f2f;">Order Ticket for: <span style="color: #138944;">{{ $event->title }}</span></h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm" role="alert" style="font-size: 1rem; border-radius: 12px; background-color: #d4edda; color: #155724;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger shadow-sm" role="alert" style="font-size: 1rem; border-radius: 12px; background-color: #f8d7da; color: #721c24;">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4 shadow-lg rounded-4 mb-5" style="background-color: #f9f9f9; border-radius: 20px; max-width: 600px; margin: auto;">
        <p class="text-muted mb-4" style="font-size: 1.1rem; color: #7f8c8d;"><strong>Price:</strong> <span style="color: #702e0d;">${{ $event->price }}</span></p>
        <p class="text-muted mb-4" style="font-size: 1.1rem; color: #7f8c8d;"><strong>Location:</strong> <span style="color: #9b59b6;">{{ $event->location }}</span></p>

        <form action="{{ route('events.storeOrder', $event->id) }}" method="POST" class="mb-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label" style="font-size: 1.1rem; font-weight: 600; color: #2d2d2d;">Your Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    required
                    style="border-radius: 15px; border: 1px solid #ccc; font-size: 1rem; padding: 12px 15px; color: #333;"
                >
                @error('name')
                    <div class="invalid-feedback" style="font-size: 1rem; color: #3d0f0a;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label" style="font-size: 1.1rem; font-weight: 600; color: #2d2d2d;">Contact Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    required
                    style="border-radius: 15px; border: 1px solid #ccc; font-size: 1rem; padding: 12px 15px; color: #333;"
                >
                @error('email')
                    <div class="invalid-feedback" style="font-size: 1rem; color:linear-gradient(135deg, #306f69, #201c3d);">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #094577, #49280f); color: white; font-weight: bold; font-size: 1.1rem; padding: 12px 25px; border-radius: 30px;">
                    Confirm Order
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary" style="font-size: 1.1rem; padding: 12px 25px; border-radius: 30px;">
                    Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
