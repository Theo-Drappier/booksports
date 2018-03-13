@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb8">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb8">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Your bookings</div>
                <div class="card-body">
                    @if ($calendar)
                        {!! $calendar->calendar() !!}
                    @else
                        <div>Vous n'avez aucune réservation en cours !</div>
                    @endif
                    <!--if ($bookings->isNotEmpty())
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row bold center">
                                    <div class="col-md-3">Date</div>
                                    <div class="col-md-3">Heure de début</div>
                                    <div class="col-md-3">Heure de fin</div>
                                    <div class="col-md-3">Terrain</div>
                                </div>
                            </div>
                            <hr/>
                            <div class="col-md-12">
                                foreach ($bookings as $booking)
                                    <div class="row">
                                        <div class="col-md-3">{ $booking->setBookingDateFormat() }}</div>
                                        <div class="col-md-3">{ $booking->start_hour }}</div>
                                        <div class="col-md-3">{ $booking->end_hour }}</div>
                                        <div class="col-md-3">{ $booking->getFieldRow()->name }}</div>
                                    </div>
                                endforeach
                            </div>
                        </div>
                    endif-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
