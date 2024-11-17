@extends('admin.layouts.master')

@section('content')
<section class="mb-2 d-flex justify-content-between align-items-center">
    <h2 class="h4">Categories</h2>
    <a href="create.php" class="btn btn-sm btn-success">Create</a>
</section>

<section class="table-responsive">
    <table class="table table-striped table-">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>2</td>
                <td>name</td>
                <td>
                    <a href="" class="btn btn-info btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>


        </tbody>
    </table>
</section>

@endsection