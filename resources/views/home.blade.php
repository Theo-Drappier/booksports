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
                    @if ($bookings->isNotEmpty())
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Heure de début</th>
                                    <th>Heure de fin</th>
                                    <th>Terrain</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->start_hour }}</td>
                                        <td>{{ $booking->end_hour }}</td>
                                        <td>{{ $booking->getFieldRow()->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>Vous n'avez aucune réservation en cours !</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
