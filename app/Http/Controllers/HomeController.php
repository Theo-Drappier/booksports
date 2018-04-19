<?php

namespace App\Http\Controllers;

use Calendar;
use App\Bookings;
use App\Fields;
use Illuminate\Http\Request;
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
        // If the user is the administrator, show all bookings
        if (Auth::user()->role == 0) {
            $bookings = Bookings::all();
        } else {
            $bookings = Bookings::where('user_id', Auth::id())->get();
        }
        // Verify if there is bookings to create the calendar
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
            if (Auth::user()->role == 0) {
                $calendar->setOptions([
                    'defaultView' => 'agendaWeek',
                    'aspectRatio' => 1.5
                ]);
            }
        }
        $fields = Fields::all();
        return view('home', ['calendar' => $calendar, 'fields' => $fields]);
    }
}
