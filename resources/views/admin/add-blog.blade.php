@extends('layouts/admin')
@section('section')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/add-blog" method="post" class="form-horizontal form-material">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Title</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Title..."
                                    class="form-control p-0 border-0" name="title"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Description</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Description..."
                                    class="form-control p-0 border-0" name="description"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Image</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="file" class="form-control p-0 border-0" name="image"> 
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Body</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea rows="5" class="form-control p-0 border-0" name="body"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Category</label>

                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none p-0 border-0 form-control-line" name="category">
                                    @foreach ($categories as $category)
                                        <option>$category->name</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Add Blog</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
                