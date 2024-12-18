@extends('admin.layouts.master')

@section('content')
<section class="mb-2 d-flex justify-content-between align-items-center">
    <h2 class="h4">Articles</h2>
    <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-success">Create</a>
</section>

<section class="table-responsive">
    <table class="table table-striped table-">
        <thead>
            <tr>
                <th>#</th>
                <th>image</th>
                <th>title</th>
                <th>cat_id</th>
                <th>body</th>
                <th>status</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td><img style="width: 90px;" src="{{ asset($post->image['indexArray']['medium']) }}"></td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ str($post->body)->substr(0,20) }}</td>
                <td>
                    @if ($post->status === 1)
                    <span class="text-success">enable</span>
                    @else
                    <span class="text-danger">disable</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.post.change-status',$post) }}" class="btn btn-warning btn-sm">Change status</a>
                    <a href="{{ route('admin.post.edit',$post) }}" class="btn btn-info btn-sm">Edit</a>
                    <form style="display: inline;" action="{{ route('admin.post.delete',$post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</section>


@endsection