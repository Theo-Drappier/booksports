@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default border-primary">
                    <div class="card-header">Available Period</div>
                    <div class="card-body">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-default border-danger">
                    <div class="card-header">Want to book ?</div>
                    <div class="card-body">
                        <form action="{{ route('savebooking') }}" method="POST">
                            @csrf
                            <div class="row form-group">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
                                <div class="col-md-6">
                                    <input id="date" type="hidden" name="date" value="{{ $date }}" required autofocus>
                                    <span>{{ $date }}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="startHour" class="col-md-4 col-form-label text-md-right">Start Hour</label>
                                <div class="col-md-6">
                                    <input id="startHour" type="time" name="startHour" class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="endHour" class="col-md-4 col-form-label text-md-right">End Hour</label>
                                <div class="col-md-6">
                                    <input id="endHour" type="time" name="endHour" class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="fieldId" class="col-md-4 col-form-label text-md-right">Field</label>
                                <div class="col-md-6">
                                    <input id="fieldId" type="hidden" name="fieldId" value="{{ $field->id }}" required autofocus>
                                    <span>{{ $field->name }}</span>
                                </div>
                            </div>
                            <input id="userId" type="hidden" name="userId" value="{{ Auth::id() }}" required autofocus>
                            <div class="row form-group">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Book
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
