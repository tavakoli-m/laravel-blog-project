@extends('admin.layouts.master')

@section('content')
<form action="create.php" method="post">
    <section class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="name ...">
    </section>
    <section class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
    </section>

</form>
@endsection