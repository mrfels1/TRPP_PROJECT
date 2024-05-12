@extends ('layout')

@section('content')

<style>
    .center_min {
        margin-left: 20%;
        width: 100px;
    }

    .center {
        margin-left: 20%;
        margin-right: 20%;
    }

    .post {
        padding: 1%;
    }

    .title {
        margin-left: 20%;
        font-size: 34px;
        font-weight: 1000;
    }

    .text_content {
        margin-left: 20%;
        margin-right: 20%;
        padding: 0 25px;
        font-size: 18px;
        font-weight: 600;
    }

    .table {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        width: 50%;
    }

    .upvote_cnt {
        grid-column-start: 1;
        grid-column-end: 2;
    }

    .downvote_cnt {
        grid-column-start: 2;
        grid-column-end: 3;
    }

    .comment_cnt {
        grid-column-start: 4;
        grid-column-end: 5;
    }
</style>
@if (Route::has('login'))
<!-- Если есть метод(?) login в rotes -->
<div class="">
    <!-- Проверяет залогинен ли пользователь -->
    @if (Auth::check())
    <a href="{{ route('post.createpost')}}">Create Post</a>
    <!--TODO:-->
    <a href="{{ url('/dashboard') }}">Dashboard</a>
    @else
    <a href="{{ url('/login') }}">Login</a>
    <a href="{{ url('/register') }}">Register</a>
    @endif
</div>
@endif
@unless(count($posts) == 0)

<aside class="popular-topics-panel">
    {{-- Боковая панель (сайдбар) --}}
    <nav>
        <h3>Топ популярных тегов:</h3>
        <ul>
            @foreach($popular_tags as $tag)
            <li><a href="/posts/?tag={{$tag->text_content}}">{{$tag->text_content}}</a></li>
            @endforeach
        </ul>
    </nav>
</aside>

{{-- Вывод всех постов из запроса. Управляется из web.php "route /posts" --}}
<div class="user-posts">
    @foreach($posts as $post)
    <div class="post">
        <h2 class="title">
            <a href="/post/{{$post->id}}">{{$post->title}}</a>
        </h2>
        <h3 class="text_content">
            Автор: {{$post->getUserName()}}
        </h3>
        <h3 class="center">
            @foreach($post->getAllTags() as $tag)
            <span>{{$tag->text_content}}</span>
            @endforeach
        </h3>

        <p class="text_content">
            {{$post->text_content}}
        </p>
        @if (Auth::check())
        <div class="center table">

            <div class="upvote_cnt">
                <form method="POST" action="/post/{{$post->id}}/like">
                    @csrf
                    <button type="submit"
                        style="{{$post->isLikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                        [▲] {{$post->likes ?:0}}
                    </button>
                </form>
            </div>

            <div class="downvote_cnt">
                <form method="POST" action="/post/{{$post->id}}/like">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        style="{{$post->isDislikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                        [▼] {{$post->dislikes ?:0}}
                    </button>
                </form>
            </div>
            <div class="comment_cnt" style="color: black;">
                Комм: {{$post->comments ?:0}}</div>

        </div>
        @else
        <div class="center table">

            <div class="upvote_cnt" style="color: black; ">
                [▲] {{$post->likes ?:0}}</div>
            <div class="downvote_cnt" style="color: black;">
                [▼] {{$post->dislikes ?:0}}</div>
            <div class="comment_cnt" style="color: black;">
                Комм: {{$post->comments ?:0}}</div>

        </div>
        @endif
    </div>
    @endforeach
</div>
@else
<p>No posts</p>
@endunless
@endsection