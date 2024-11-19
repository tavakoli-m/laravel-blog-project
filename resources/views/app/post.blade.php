@extends('app.layouts.master')

@section('content')
<section class="row">
    <section class="col-md-12">
        <h1>{{ $post->title }}</h1>
        <h5 class="d-flex justify-content-between align-items-center">
            <a href="{{ route('app.category',$post->category->id) }}">{{ $post->category->name }}</a>
            <span class="date-time">{{ $post->created_at->format('Y/m/d') }}</span>
        </h5>
        <article class="bg-article p-3">
                <img class="w-100 mb-2 ml-2" style="width: 18rem;" src="{{ asset($post->image['indexArray']['medium']) }}" alt="">

            {{ $post->body }}
        </article>


    </section>
</section>

@endsection