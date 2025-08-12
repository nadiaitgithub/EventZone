@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Admin Panel</h2>

    <!-- All Users Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.users') }}" class="btn btn-primary">
            <i class="bi bi-people-fill me-1"></i> All Users
        </a>
    </div>

    <h4 class="mt-4 mb-3">Events Grouped by User & Location</h4>

    @php
        $grouped = $events->groupBy('user_id');
    @endphp

    @foreach($grouped as $userId => $userEvents)
        @php
            $user = $userEvents->first()->user;
            $sortedEvents = $userEvents->sortBy('location');
        @endphp

        <div class="card mb-4">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $user->name ?? 'Unknown User' }}</strong><br>
                    <small>{{ $user->email ?? 'N/A' }}</small>
                </div>
                <span class="badge bg-secondary">Total Events: {{ $userEvents->count() }}</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sortedEvents as $event)
                                <tr>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>
                                        <span class="badge bg-{{ $event->is_approved ? 'success' : 'secondary' }}">
                                            {{ $event->is_approved ? 'Approved' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if(!$event->is_approved)
                                            <form method="POST" action="/admin/events/{{ $event->id }}/approve" class="d-inline">
                                                @csrf
                                                <button class="btn btn-success btn-sm"><i class="bi bi-check-circle"></i> Approve</button>
                                            </form>
                                            <form method="POST" action="/admin/events/{{ $event->id }}/reject" class="d-inline">
                                                @csrf
                                                <button class="btn btn-warning btn-sm"><i class="bi bi-x-circle"></i> Reject</button>
                                            </form>
                                        @endif
                                        <form method="POST" action="/admin/events/{{ $event->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
