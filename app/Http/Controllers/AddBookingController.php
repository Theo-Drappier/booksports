<?php

namespace App\Http\Controllers;

use App\Fields;
use App\Bookings;
use App\Http\Requests\AddBookingRequest;
use Illuminate\Http\Request;

class AddBookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Fields::all();
        return view('addbooking', compact('fields'));
    }

    /**
     * Send the new booking to database
     * @param  Request $request The post Request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $date = $request->date;
        $startHour = $request->startHour;
        $endHour = $request->endHour;
        $userId = $request->userId;
        $fieldId = $request->fieldId;

        $booking = new Bookings;
        $booking->booking_date = $date;
        $booking->start_hour = $startHour;
        $booking->end_hour = $endHour;
        $booking->user_id = $userId;
        $booking->field_id = $fieldId;
        $booking->save();
        return redirect()->route('home');
    }
}
