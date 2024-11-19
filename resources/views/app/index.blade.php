@extends('app.layouts.master')

@section('content')
<section class="row">

@foreach ($posts as $post)


    <section class="col-md-4">
        <section class="mb-2 overflow-hidden" style="max-height: 15rem;"><img class="img-fluid" src="{{ asset($post->image['indexArray']['medium']) }}" alt=""></section>
        <h2 class="h5 text-truncate">{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <p><a class="btn btn-primary" href="{{ route('app.post',$post) }}" role="button">View details »</a></p>
    </section>
    @endforeach

</section>
@endsection