@extends ('layout')

@section('content')

<style>
    .post {
        padding: 1%;
    }

    .title {
        margin-left: 20%;
        font-size: 34px;
        font-weight: 1000;
    }

    .text_content {
        margin: 5% 20% 5% 5%;
        padding: 0 25px;
        font-size: 18px;
        font-weight: 800;
    }
</style>

@unless(count($posts) == 0)

{{-- Вывод всех постов из запроса. Управляется из web.php "route /posts" --}}

@foreach($posts as $post)
<div class="post">
    <h2 class="title">
        <a href="/post/{{$post['id']}}">{{$post['title']}}</a>
    </h2>
    <p class="text_content">
        {{$post['text_content']}}
    </p>
</div>

@endforeach
@else
<p>No posts</p>
@endunless
@endsection