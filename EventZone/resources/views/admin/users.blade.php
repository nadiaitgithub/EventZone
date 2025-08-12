@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-5" style="font-weight: 700; color: #2c3e50;">All Registered Users</h2>

    @if(session('success'))
        <div class="alert alert-success text-center fw-bold">{{ session('success') }}</div>
    @endif

    @if($users->isEmpty())
        <div class="text-center text-muted">No users found.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($users as $user)
                <div class="col">
                    <div class="card shadow border-0 rounded-4 h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <img
                                    src="{{ $user->image ? asset('storage/' . $user->image) : 'https://via.placeholder.com/80' }}"
                                    alt="User Image"
                                    class="rounded-circle shadow"
                                    width="80"
                                    height="80"
                                >
                            </div>

                            <h5 class="fw-bold" style="color: #34495e;">{{ $user->name }}</h5>
                            <p class="text-muted mb-1">{{ $user->email }}</p>
                            <p class="text-secondary" style="min-height: 40px;">{{ $user->bio ?? 'No bio provided.' }}</p>

                            <form
                                action="{{ route('admin.users.destroy', $user->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this user?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" style="background-color: #e74c3c; color: white; border-radius: 20px; padding: 6px 20px;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
