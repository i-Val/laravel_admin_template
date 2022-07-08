@extends('layouts/admin')
@section('section')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/add-category" method="post" class="form-horizontal form-material">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Category Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">description</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea rows="5" class="form-control p-0 border-0" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Add Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
                