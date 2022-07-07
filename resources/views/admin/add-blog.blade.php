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
                            <label class="col-md-12 p-0">Title</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Title..."
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Description</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Description..."
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Image</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="file" class="form-control p-0 border-0"> 
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Body</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea rows="5" class="form-control p-0 border-0"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Category</label>

                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option>London</option>
                                    <option>India</option>
                                    <option>Usa</option>
                                    <option>Canada</option>
                                    <option>Thailand</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Add Blog</button>
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
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->

@endsection
                