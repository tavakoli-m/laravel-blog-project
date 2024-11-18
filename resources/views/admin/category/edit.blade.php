@extends('admin.layouts.master')
@section('content')

<form action="{{ route('admin.category.update',$category) }}" method="POST">
    @csrf
    @method('PUT')
    <section class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="name ..." value="{{ old('name',$category->name) }}">
        @error('name')
        <div class="alert alert-danger my-3">
            {{ $message }}
        </div>
        @enderror
    </section>
    <section class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </section>
</form>

@endsection