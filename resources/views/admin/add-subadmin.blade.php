@extends('layouts/admin')
@section('section')
<!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Full Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email" placeholder="johnathan@admin.com"
                                    class="form-control p-0 border-0" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Password</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password" value="password" class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Phone No</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="123 456 7890"
                                    class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Select Role</label>

                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option>...</option>
                                    <option>Super admin</option>
                                    <option>Sub admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Select Location</label>

                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option>Outside Nigeria</option>
                                    <option>ABUJA FCT</option>
                                    <option>ABIA</option>
                                    <option>ADAMAWA</option>
                                    <option>AKWA IBOM</option>
                                    <option>ANAMBRA</option>
                                    <option>BAUCHI</option>
                                    <option>BAYELSA</option>
                                    <option>BENUE</option>
                                    <option>BORNO</option>
                                    <option>CROSS RIVER</option>
                                    <option>DELTA</option>
                                    <option>EBONYI</option>
                                    <option>EDO</option>
                                    <option>EKITI</option>
                                    <option>ENUGU</option>
                                    <option>GOMBE</option>
                                    <option>IMO</option>
                                    <option>JIGAWA</option>
                                    <option>KADUNA</option>
                                    <option>KANO</option>
                                    <option>KATSINA</option>
                                    <option>KEBBI</option>
                                    <option>KOGI</option>
                                    <option>KWARA</option>
                                    <option>LAGOS</option>
                                    <option>NASSARAWA</option>
                                    <option>NIGER</option>
                                    <option>OGUN</option>
                                    <option>ONDO</option>
                                    <option>OSUN</option>
                                    <option>OYO</option>
                                    <option>PLATEAU</option>
                                    <option>RIVERS</option>
                                    <option>SOKOTO</option>
                                    <option>TARABA</option>
                                    <option>YOBE</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Add Sub-admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
@endsection
                