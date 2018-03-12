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
    public function index(Request $request)
    {
        $fields = Fields::all();
        return view('addbooking', ['fields' => $fields]);
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

        $verifyBooking = Bookings::where([
            ['booking_date', '=', $date],
            ['field_id', '=', $fieldId]
        ])->where(function($q) use ($startHour, $endHour) {
            $q->whereBetween('start_hour', [$startHour, $endHour])
              ->orWhereBetween('end_hour', [$startHour, $endHour]);
        })->get();

        if($verifyBooking->isNotEmpty()) {
            $message = 'There is already a booking in the chosen period';
            return redirect('addBooking')->with('message', $message);
        }

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
