@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Manage users</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Birth Date</th>
                                    <th>Role</th>
                                    <th>Edit role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type="hidden" value="{{ route('updateroleuser') }}" id="url"/>
                                @foreach ($users as $user)
                                    <tr>
                                        <input type="hidden" value="{{ $user->id }}" name="idUser"/>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->birth_date }}</td>
                                        <td>
                                            <select class="selectRole" id="selectRole{{ $user->id }}" name="role" disabled>
                                                <option value="0" {{ $user->role === 0 ? "selected" : "" }}>Admin</option>
                                                <option value="1" {{ $user->role === 1 ? "selected" : "" }}>Manager Association</option>
                                                <option value="5" {{ $user->role === 5 ? "selected" : "" }}>User</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary edit" id="edit{{ $user->id }}">Edit</button>
                                            <button class="validate d-none btn btn-success editionRole{{ $user->id }}" id="validate{{ $user->id }}">Validate</button>
                                            <button class="cancel d-none btn btn-danger editionRole{{ $user->id }}" id="cancel{{ $user->id }}">Cancel</button>
                                        </td>
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

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var originRole;
            $("button.edit").click(function (e) {
                var target = $(e.target).attr('id');
                var idUser = target.replace('edit', '');
                originRole = $("select#selectRole" + idUser + " option:selected").val();
                $("select#selectRole" + idUser).removeAttr("disabled");
                $("button#edit" + idUser).addClass("d-none");
                $(".editionRole" + idUser).removeClass("d-none");
            });

            $("button.cancel").click(function (e) {
                var target = $(e.target).attr('id');
                var idUser = target.replace('cancel', '');
                $("select#selectRole" + idUser).attr("disabled", true);
                $("button#edit" + idUser).removeClass("d-none");
                $(".editionRole" + idUser).addClass("d-none");
            });

            $("button.validate").click(function (e) {
                var target = $(e.target).attr('id');
                var idUser = target.replace('validate', '');
                var url = $("input#url").val();
                var bodyPost = {
                    idUser: idUser,
                    roleUser: $("select#selectRole" + idUser + " option:selected").val(),
                    _token: '{{ csrf_token() }}'
                };
                $.post(url,bodyPost, function (data) {
                    if (data.state) {
                        alert('A manager association must have only one association linked. But this account got more than one association');
                        $("select#selectRole" + idUser).val(originRole);
                    }
                    $("select#selectRole" + idUser).attr("disabled", true);
                    $("button#edit" + idUser).removeClass("d-none");
                    $(".editionRole" + idUser).addClass("d-none");
                });
            });
        });
    </script>
@endsection
