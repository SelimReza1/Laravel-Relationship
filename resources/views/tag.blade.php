@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h2>Tag = {{$tag->name}}</h2>
                    @foreach($tag->posts as $post)
                        <h5>{{$post->title}} in
                            <a href="{!! route('category', $post->category->id) !!}"><mark><small>{{$post->category->name}}</small></mark></a>
                        </h5>
                        <p>{{$post->description}}</p>
                        <div>
                            @foreach($post->tags as $tag)
                                <span class="badge badge-warning"><a href="{!! route('tag', $tag->id) !!}" >{{$tag->name}}</a></span>
                            @endforeach
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
