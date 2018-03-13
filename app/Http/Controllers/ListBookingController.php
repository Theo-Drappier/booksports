<?php

namespace App\Http\Controllers;

use Calendar;
use App\Fields;
use App\Bookings;
use Illuminate\Http\Request;

class ListBookingController extends Controller
{
    public function index() {
        return view('listbooking');
    }

    public function available(Request $request) {
        $date = $request->date;
        $fieldId = $request->fieldId;
        $bookings = Bookings::where([
            ['booking_date', '=', $date],
            ['field_id', '=', $fieldId]
        ])->get();
        $events = [];
        if ($bookings->isEmpty()) {
            $events[] = Calendar::event(
                'Available',
                false,
                new \DateTime($date.' '.'06:00:00'),
                new \DateTime($date.' '.'22:00:00')
            );
        } else {
            $calendar = [];
        }

        $calendar = Calendar::addEvents($events)->setOptions([
            'defaultView' => 'agendaDay',
            'defaultDate' => $date,
            'timeFormat' => 'H(:mm)'
        ]);

        $field = Fields::where('id', $fieldId)->first();

        return view('listbooking', ['calendar' => $calendar, 'date' => $date, 'field' => $field]);
    }
}
