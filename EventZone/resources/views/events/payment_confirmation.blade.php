@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Payment Confirmation for: {{ $event->title }}</h2>

    <div class="text-center mb-3">
        <p><strong>Price:</strong> ${{ $event->price }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <p class="text-center mb-4">Please select a payment method:</p>

    <div class="row justify-content-center">
        @php
            $payments = [
                ['name' => 'bKash', 'img' => 'https://i.ibb.co/6NDQd9W/bkash.png'],
                ['name' => 'Nagad', 'img' => 'https://i.ibb.co/pKdWjxM/nagad.png'],
                ['name' => 'Rocket', 'img' => 'https://i.ibb.co/ZBJbLQy/rocket.png'],
                ['name' => 'Card Payment', 'img' => 'https://i.ibb.co/vJmN38d/credit-card.png']
            ];
        @endphp

        @foreach ($payments as $payment)
        <div class="col-md-3 col-6 mb-4">
            <div class="card text-center shadow-sm payment-card" style="border-radius: 15px; transition: transform 0.3s;">
                <div class="card-body">
                    <img src="{{ $payment['img'] }}" alt="{{ $payment['name'] }}" class="img-fluid mb-2" style="height: 80px;">
                    <h6 class="card-title mt-2">{{ $payment['name'] }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('events.show', $event->id) }}" class="btn btn-secondary">Back to Event</a>
    </div>
</div>

{{-- Custom hover effect --}}
<style>
    .payment-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection
