@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Event</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Event Title</label>
            <input type="text" name="title" value="{{ old('title', $event->title) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Event Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" value="{{ old('location', $event->location) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" value="{{ old('date', $event->date) }}" class="form-control" required>
        </div>

        @php use Carbon\Carbon; @endphp
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" name="start_time" value="{{ old('start_time', Carbon::parse($event->start_time)->format('H:i')) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" name="end_time" value="{{ old('end_time', Carbon::parse($event->end_time)->format('H:i')) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ticket_price" class="form-label">Ticket Price (BDT)</label>
            <input type="number" name="ticket_price" value="{{ old('ticket_price', $event->ticket_price) }}" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="total_seats" class="form-label">Total Seats</label>
            <input type="number" name="total_seats" value="{{ old('total_seats', $event->total_seats) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
