@extends('layouts/admin')
@section('section')
<!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/add-subadmin"  method="post" class="form-horizontal form-material">
                        @csrf
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
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Add Sub-admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
                