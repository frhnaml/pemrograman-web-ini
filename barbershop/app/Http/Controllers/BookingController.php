<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return response()->json(Booking::all());
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'package' => 'required|string',
        ]);

        $booking = Booking::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Booking created successfully.',
            'data' => $booking
        ], 201);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Booking details retrieved successfully.',
            'data' => $booking
        ]);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Booking updated successfully.',
            'data' => $booking
        ]);
    }

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Booking deleted successfully.'
        ]);
    }
}
