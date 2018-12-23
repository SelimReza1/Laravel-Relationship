@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h2>Add A Post</h2>
                    <form action="{{route('posts.store')}}" method="post">
                        @csrf
                        <label for="">Enter Post Title</label><br>
                        <input type="text" name="title" class="form-control">

                        <label for="">Enter Post Description</label><br>
                        <textarea type="text" name="description" class="form-control" rows="5"></textarea>

                        <label for="">Category</label><br>
                        <select class="form-control select" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                        </select>

                        <label for="">Tags</label><br>
                        <select class="form-control select2-multi" name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>

                        <input type="submit" class="mt-2 btn btn-primary float-right" name="" value="insert">
                    </form>
                </div>
                <div class="card card-body">
                    @foreach($posts as $post)
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

@section('script')
<script>
        $('.select2-multi').select2();
        $('.select').select2();
</script>
@endsection