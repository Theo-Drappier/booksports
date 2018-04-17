@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Add an existing user to your association
                    </div>
                    <div class="card-body">
                        <form action="{{ route('savelicensee') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="user" class="text-md-right col-md-4 col-form-label">New licensee</label>
                                <div class="col-md-6">
                                    <select name="user" class="form-control">
                                        @foreach ($usersAdd as $user)
                                            <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->name }} {{ $user->birth_date }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <input class="btn btn-primary" type="submit" value="Add new licensee"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Licensees list</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Birth date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersRegister as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->birth_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
