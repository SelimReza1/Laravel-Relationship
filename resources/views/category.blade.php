@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h2>Category = {{$categories->name}}</h2>
                    @foreach($categories->posts as $post)
                        <h5>{{$post->title}} in
                            <a href="{!! route('category', $post->category->id) !!}"><mark><small>{{$post->category->name}}</small></mark></a>
                        </h5>
                        <p>{{$post->description}}</p>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
