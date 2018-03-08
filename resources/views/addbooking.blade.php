@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create a new booking</div>

                <div class="card-body">
                  <form action="{{ route('savebooking') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
                      <div class="col-md-6">
                          <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required autofocus>

                          @if ($errors->has('date'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('date') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="startHour" class="col-md-4 col-form-label text-md-right">Start Hour</label>
                      <div class="col-md-6">
                          <input id="startHour" type="time" class="form-control{{ $errors->has('startHour') ? ' is-invalid' : '' }}" name="startHour" value="{{ old('startHour') }}" required autofocus>

                          @if ($errors->has('startHour'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('startHour') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="endHour" class="col-md-4 col-form-label text-md-right">End Hour</label>
                      <div class="col-md-6">
                          <input id="endHour" type="time" class="form-control{{ $errors->has('endHour') ? ' is-invalid' : '' }}" name="endHour" value="{{ old('endHour') }}" required autofocus>

                          @if ($errors->has('endHour'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('endHour') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="fieldId" class="col-md-4 col-form-label text-md-right">Choose a Field</label>
                      <div class="col-md-6">
                          <select name="fieldId" id="fieldId" class="form-control">
                              @foreach ($fields as $field)
                                <option value="{{ $field->id }}">{{ $field->name }}</option>
                              @endforeach
                          </select>

                          @if ($errors->has('fieldId'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('fieldId') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}"/>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Send
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
