@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create a new association</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="name" class="text-md-right col-md-4 col-form-label">Association Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user" class="text-md-right col-md-4 col-form-label">Manager Association</label>
                                <div class="col-md-6">
                                    <select name="user" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} {{ $user->firstname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-md-4 col-md-6">
                                    <input class="btn btn-primary" type="submit" value="Send"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
