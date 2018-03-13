<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use Calendar;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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
        $events = [];
        $calendar = false;
        $bookings = Bookings::where('user_id', Auth::user()->id)->get();
        if ($bookings->count()) {
            foreach($bookings as $booking) {
                $events[] = Calendar::event(
                    $booking->getFieldRow()->name,
                    false,
                    new \DateTime($booking->booking_date.' '.$booking->start_hour),
                    new \DateTime($booking->booking_date.' '.$booking->end_hour)
                );
            }
            $calendar = Calendar::addEvents($events);
        }
        return view('home', compact('calendar'));
    }
}
