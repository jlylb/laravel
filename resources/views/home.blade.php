@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <div class="container">
                @foreach ($posts as $post)
                    <p><b>[{{ $post->category->name }}]</b> {{ $post->title }}</p>
                    <p>@By <b>{{ $post->user->name }}</b></p>
                    <p>comments:<b>{{ $post->comments->count() }}</b> tags:<b>{{ $post->tags->implode('name',',') }}</b></p>
                    <hr>
                @endforeach
                </div>
                {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
