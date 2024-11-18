@extends('admin.layouts.master')
@section('content')

<form action="{{ route('admin.post.update',$post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <section class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="title ..." value="{{ old('title',$post->title) }}">
        @error('title')
        <div class="alert alert-danger my-3">
            {{ $message }}
        </div>
        @enderror
    </section>
    <section class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image">
        @error('image')
        <div class="alert alert-danger my-3">
            {{ $message }}
        </div>
        @enderror
    </section>
    <section class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if(old('category_id',$post->category_id) === $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
        <div class="alert alert-danger my-3">
            {{ $message }}
        </div>
        @enderror
    </section>
    <section class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" name="body" id="body" rows="5" placeholder="body ...">
            {{ old('body',$post->body) }}
        </textarea>
        @error('body')
        <div class="alert alert-danger my-3">
            {{ $message }}
        </div>
        @enderror
    </section>
    <section class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
    </section>
</form>
@endsection