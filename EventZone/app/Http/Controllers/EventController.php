<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Order;

class EventController extends Controller
{
    /**
     * Display a listing of all events.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Display the specified event.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_date'  => 'nullable|date',
            'price'       => 'nullable|numeric',
            'location'    => 'nullable|string|max:255',
            'start_date'  => 'nullable|date|before_or_equal:end_date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'start_time'  => 'nullable|date_format:H:i',
            'end_time'    => 'nullable|date_format:H:i|after_or_equal:start_time',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create event
        $event = new Event();
        $event->title       = $request->title;
        $event->description = $request->description;
        $event->event_date  = $request->event_date;
        $event->price       = $request->price;
        $event->location    = $request->location;
        $event->start_date  = $request->start_date;
        $event->end_date    = $request->end_date;
        $event->start_time  = $request->start_time;
        $event->end_time    = $request->end_time;
        $event->user_id     = auth()->user()->id;
        $event->image       = $imagePath;
        $event->save();

        return redirect()->route('events.index')
                         ->with('success', 'Event created successfully.');
    }

    /**
     * Show the order form for a specific event.
     */
    public function order($id)
    {
        $event = Event::findOrFail($id);
        return view('events.order', compact('event'));
    }

    /**
     * Store a new order for an event.
     */
    public function storeOrder(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Ensure the event exists
        $event = Event::findOrFail($id);

        // Create order
        Order::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'event_id' => $event->id,
        ]);

        return redirect()->route('events.paymentConfirmation', ['id' => $id])
                         ->with('success', 'Your order has been placed! Now choose your payment option.');
    }

    /**
     * Show payment confirmation page for an event.
     */
    public function paymentConfirmation($id)
    {
        $event = Event::findOrFail($id);
        return view('events.payment_confirmation', compact('event'));
    }

    /**
     * Display events created by the authenticated user.
     */
    public function dashboard()
    {
        $events = Event::where('user_id', auth()->id())->get();
        return view('dashboard', compact('events'));
    }

    /**
     * Show the form to edit an event.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        // Optional: prevent editing others' events
        if ($event->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('events.edit', compact('event'));
    }

    /**
     * Handle event update.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        if ($event->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_date'  => 'nullable|date',
            'price'       => 'nullable|numeric',
            'location'    => 'nullable|string|max:255',
            'start_date'  => 'nullable|date|before_or_equal:end_date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'start_time'  => 'nullable|date_format:H:i',
            'end_time'    => 'nullable|date_format:H:i|after_or_equal:start_time',
        ]);

        // Update image if provided
        if ($request->hasFile('image')) {
            $event->image = $request->file('image')->store('images', 'public');
        }

        // Update event details
        $event->update($request->only([
            'title', 'description', 'event_date', 'price',
            'location', 'start_date', 'end_date', 'start_time', 'end_time'
        ]));

        return redirect()->route('dashboard')->with('success', 'Event updated successfully.');
    }
}
