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

    /**
     * Controller of the available booking page.
     * We create a calendar with event when the event correspond to the available schedule
     * @param  Request $request
     * @return
     */
    public function available(Request $request) {
        $date = $request->date;
        $fieldId = $request->fieldId;
        $bookings = Bookings::where([
            ['booking_date', '=', $date],
            ['field_id', '=', $fieldId]
        ])->orderBy('start_hour', 'asc')->get();
        $events = [];
        if ($bookings->isEmpty()) {
            // Create a new event for the calendar
            $events[] = Calendar::event(
                'Available',
                false,
                new \DateTime($date.' 06:00:00'),
                new \DateTime($date.' 22:00:00')
            );
        } else {
            $compt = 0;
            foreach($bookings as $booking) {
                $endHour = $booking->start_hour;
                // 06:00:00 is the start hour of the complex
                if ($endHour != '06:00:00') {
                    if ($compt == 0) {
                        // Create a new event for the calendar
                        $events[] = Calendar::event(
                            'Available',
                            false,
                            new \DateTime($date.' 06:00:00'),
                            new \DateTime($date.' '.$endHour)
                        );
                    } else {
                        if ($startHour != $endHour) {
                            // Create a new event for the calendar
                            $events[] = Calendar::event(
                                'Available',
                                false,
                                new \DateTime($date.' '.$startHour),
                                new \DateTime($date.' '.$endHour)
                            );
                        }
                    }
                }
                $startHour = $booking->end_hour;
                $compt++;
            }
            // 22:00:00 is the end hour of the complex
            if ($startHour != '22:00:00') {
                // Create a new event for the calendar
                $events[] = Calendar::event(
                    'Available',
                    false,
                    new \DateTime($date.' '.$startHour),
                    new \DateTime($date.' 22:00:00')
                );
            }
        }
        // Create the calendar
        $calendar = Calendar::addEvents($events)->setOptions([
            'defaultView' => 'agendaDay',
            'defaultDate' => $date,
            'timeFormat' => 'H:mm'
        ]);

        $field = Fields::where('id', $fieldId)->first();

        return view('listbooking', ['calendar' => $calendar, 'date' => $date, 'field' => $field]);
    }
}
