@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- Profile Card --}}
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <div class="mb-4">
                        @if(Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded-circle shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                        @else
                            <img src="https://i.ibb.co/2nF8b6Z/default-user.png" class="rounded-circle shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                        @endif
                    </div>
                    <h3 class="mb-1">{{ Auth::user()->name }}</h3>
                    <p class="text-muted mb-2">{{ Auth::user()->email }}</p>
                    <p class="text-secondary">{{ Auth::user()->bio ?? 'No bio added yet.' }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary mt-2">Edit Profile</a>

                </div>
            </div>
        </div>
    </div>

    {{-- My Events Section --}}
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-md-6">
            <h4>🎉 My Events</h4>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('events.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i> Create New Event
            </a>
        </div>
    </div>

    <div class="row">
        @forelse($events as $event)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm rounded-4">
                @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top rounded-top-4" style="height: 180px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($event->description, 100) }}</p>
                    <p class="text-sm text-secondary">
                        <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }} <br>
                        <i class="bi bi-geo-alt"></i> {{ $event->location }}
                    </p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between">
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye"></i> View
                    </a>
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted mt-4">
            <p>You haven't created any events yet.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
