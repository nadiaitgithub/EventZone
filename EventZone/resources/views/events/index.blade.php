@extends('layouts.app')

@section('content')
<h1 class="mb-5 text-center" style="font-family: 'Roboto', sans-serif; font-size: 2.5rem; font-weight: bold; color: #2f2f2f;">Upcoming Events</h1>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($events as $event)
    <div class="col">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden h-100" style="border: none; background-color: #f9f9f9;">
            <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}" style="object-fit: cover; height: 200px; border-radius: 15px;">

            <div class="card-body p-4" style="color: #2d2d2d; font-family: 'Poppins', sans-serif;">
                <h5 class="card-title" style="font-size: 1.75rem; font-weight: 600; color: #3f3d56;">{{ $event->title }}</h5>

                <p class="card-text" style="color: #888888; font-size: 1rem; line-height: 1.5;">{{ Str::limit($event->description, 100) }}</p>

                @if($event->start_date && $event->end_date)
                    <p class="text-info" style="color: #39094b;"><strong>Dates:</strong> {{ $event->start_date }} to {{ $event->end_date }}</p>
                @else
                    <p class="text-info" style="color: #9b59b6;"><strong>Date:</strong> {{ $event->event_date }}</p>
                @endif

                @if($event->start_time && $event->end_time)
                    <p class="text-warning" style="color: rgb(1 140 78) !important;"><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</p>
                @endif

                @if($event->location)
                    <p class="text-muted" style="color: #0f4d52;"><strong>Location:</strong> {{ $event->location }}</p>

                    <!-- Google Maps Button -->
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($event->location) }}" target="_blank" class="btn btn-sm btn-outline-success mb-3" style="border-radius: 20px;">
                        <i class="bi bi-geo-alt-fill me-1"></i> View on Map
                    </a>
                @endif

                <p class="text-danger" style="color: #97190b; font-size: 1.2rem;"><strong>Price:</strong> ${{ $event->price }}</p>

                <a href="/event/{{ $event->id }}" class="btn" style="background: linear-gradient(135deg, #14531a, #390625); color: white; font-weight: bold; font-size: 1.1rem; padding: 12px 25px; border-radius: 30px; width: 100%; text-align: center; transition: all 0.3s ease-in-out;">
                    View Details
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
