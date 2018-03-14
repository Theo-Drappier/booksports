@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb8">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 mb8">
                    <div class="card card-default border-primary">
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
                <div class="col-md-12">
                    <div class="card card-default border-warning">
                        <div class="card-header">Search available period</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('periodavbooking') }}">
                                @csrf
                                <div class="row form-group">
                                    <label for="date" class="col-md-3 col-form-label text-md-right">Date</label>
                                    <div class="col-md-7">
                                        <input id="date" type="date" class="form-control" name="date" required autofocus />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="fieldId" class="col-md-3 col-form-label text-md-right">Field</label>
                                    <div class="col-md-7">
                                        <select name="fieldId" id="fieldId" class="form-control">
                                            @foreach ($fields as $field)
                                              <option value="{{ $field->id }}">{{ $field->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default border-success">
                        <div class="card-header">
                            @if (Auth::user()->role != 0)
                                <span>Your bookings</span>
                            @else
                                <span>Week bookings</span>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($calendar)
                                {!! $calendar->calendar() !!}
                            @else
                                <div>You have no reservation !</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
