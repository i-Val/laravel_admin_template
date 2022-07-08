@extends('layouts/admin')
@section('section')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/add-subadmin"  method="post" class="form-horizontal form-material">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Full Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Enter name.."
                                    class="form-control p-0 border-0" name="name"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email" placeholder="Enter email.."
                                    class="form-control p-0 border-0" name="email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Password</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password" name="password" class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Phone No</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Enter phone number.."
                                    class="form-control p-0 border-0" name="phone">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Select Role</label>

                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none p-0 border-0 form-control-line">
                                    @foreach ($roles as $role)
                                        <option value="$role->id">$role->name</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Select Location</label>

                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none p-0 border-0 form-control-line">
                                    @foreach ($locations as $location)
                                        <option value="$location->name">$location->name</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Add Sub-admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
                