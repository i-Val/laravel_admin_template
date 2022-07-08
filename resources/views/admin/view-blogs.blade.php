@extends('layouts/admin');
@section('section')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Blogs</h3>
                <p class="text-muted">Add class <code>.table</code></p>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">title</th>
                                <th class="border-top-0">description Name</th>
                                <th class="border-top-0">body</th>
                                <th class="border-top-0">image</th>
                                <th class="border-top-0">category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($blogs as $blog)
                                    <td>$blog->id</td>
                                <td>$user->tile</td>
                                <td>$user->description</td>
                                <td>$user->body</td>
                                <td>$user->image</td>
                                <td>$user->category</td>
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
                