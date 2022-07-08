@extends('layouts/admin');
@section('section')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Sub-admins</h3>
                <p class="text-muted">Add class <code>.table</code></p>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Full Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Location</th>
                                <th class="border-top-0">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($admins as $admin)
                                    <td>$admin->id</td>
                                <td>$dmin->name</td>
                                <td>$user->email</td>
                                <td>$user->location</td>
                                <td>$user->role</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Deshmukh</td>
                                <td>Gaylord</td>
                                <td>@Ritesh</td>
                                <td>member</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sanghani</td>
                                <td>Gusikowski</td>
                                <td>@Govinda</td>
                                <td>developer</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Roshan</td>
                                <td>Rogahn</td>
                                <td>@Hritik</td>
                                <td>supporter</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Joshi</td>
                                <td>Hickle</td>
                                <td>@Maruti</td>
                                <td>member</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Nigam</td>
                                <td>Eichmann</td>
                                <td>@Sonu</td>
                                <td>supporter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
                