@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg border-0 rounded-4">
                @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top rounded-top-4" alt="{{ $event->title }}" style="object-fit: cover; height: 400px;">
                @else
                    <img src="https://via.placeholder.com/800x400?text=Event+Image" class="card-img-top rounded-top-4" alt="Default Event Image">
                @endif

                <div class="card-body p-5">
                    <h2 class="card-title text-primary mb-4">{{ $event->title }}</h2>

                    <p class="card-text text-muted mb-4">{{ $event->description }}</p>

                    @if($event->start_date && $event->end_date)
                        <p><strong>Dates:</strong> {{ $event->start_date }} to {{ $event->end_date }}</p>
                    @else
                        <p><strong>Date:</strong> {{ $event->event_date }}</p>
                    @endif

                    @if($event->start_time && $event->end_time)
                        <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</p>
                    @endif

                    @if($event->location)
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                    @endif

                    <p class="fs-5 text-danger"><strong>Price:</strong> ${{ $event->price }}</p>

                    <div class="mt-4 d-flex gap-3">
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">← Back</a>
                        <a href="{{ url('/event/' . $event->id . '/order') }}" class="btn btn-success">🎟️ Order Ticket</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
