@extends ('layout')

@section('content')
<style>
    body {
        display: flex;
        flex-direction: column;
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
{{-- 
    Вывод одного поста по id 
    Шаг 2 -> post.blade.php строка 126
--}}

<div class="post">
    <h2 class="title">
        <a href="/post/{{$post['id']}}">{{$post['title']}}</a>
    </h2>
    <h3 class="text_content">
        Автор: {{$post->getUserName()}} {{-- Вывод имени автора поста выполняется функцией getUserName, 
            которая расположена в app/Http/Models/Post--}}
    </h3>
    <h3 class="center">
        @foreach($post->getAllTags() as $tag)
        <span>{{$tag->text_content}}</span>
        @endforeach
    </h3>

    {{-- Удаление поста --}}
    @if (Auth::check() and ((Auth::id() == $post->user_id or Auth::user()->is_admin)))
    {{-- Проверка залогинен ли пользователь и является ли он автором --}}
    <h3 class="text_content">
        <form action="{{route('post.delete', $post->id)}}" method="POST"> {{-- При подтверждении вызывается POST post.delete из 
            web.php и в запросе передаётся id поста --}}
            @csrf
            @method('DELETE') {{-- POST становится DELETE, если есть возможность сразу сделай DELETE--}}
            <button type="submit" style="color: red;">
                X
            </button>
        </form>
    </h3>
    @endif

    <p class="text_content">
        {{$post['text_content']}} {{-- Вывод аналогичный post->text_content --}}
    </p>
    {{-- Если пользователь залогинен то может лайк/дизлайк поставить--}}
    @if (Auth::check())
    <div class="center table">

        <div class="upvote_cnt">
            <form method="POST" action="/post/{{$post->id}}/like">
                {{-- При подтверждении вызывается POST /post/{{$post->id}}/like из
                web.php--}}
                @csrf
                {{-- Если пост лайкнут текущим пользователем, кнопка зелёная, иначе чёрная--}}
                <button type="submit" style="{{$post->isLikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                    {{-- isLikedBy($user) находится в app/Http/Models/Post--}}
                    <!-- [▲] {{$post->likes ?:0}}  -->
                    {{-- Выведет число лайков, если null то выведет 0--}}
                    <button class="rating-button basic-btn ratingUp">
                        <img src="{{ asset('up-arrow.png') }}" alt="Upvote"/>  {{$post->likes ?:0}}
                    </button>
                </button>
            </form>
        </div>

        <div class="downvote_cnt">
            <form method="POST" action="/post/{{$post->id}}/like">
                @csrf
                @method('DELETE')
                <button type="submit" style="{{$post->isDislikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                    [▼] 
                    <!-- {{$post->dislikes ?:0}} -->
                </button>
            </form>
        </div>

    </div>
    @else {{-- Если пользователь не залогинен--}}
    <div class="center table">

        <div class="upvote_cnt" style="color: black; ">
            [▲] {{$post->likes ?:0}}</div>
        <div class="downvote_cnt" style="color: black;">
            [▼] {{$post->dislikes ?:0}}</div>

    </div>
    @endif

</div>
{{-- ШАГ 3 -> web.php строка 56--}}
@if (Auth::check())
<form method="POST" action="/post/{{$post->id}}/comment" class="center"> {{-- см. web.php--}}
    @csrf
    <input required pattern=".*\S+.*" type="text" name="text_content">
    {{-- вводим значения переменной text_content для запроса--}}
    <button type="submit" style="color: black;">
        Отправить комментарий!
    </button>
</form>
@else
@endif

{{-- Вывод комментов --}}
@unless(count($post->getAllComments()) == 0) {{-- если комментов не 0, то--}}
@foreach($post->getAllComments() as $comment)

<div class="post">
    <h3 class="text_content">
        Автор: {{$comment->getUserName()}} {{-- см. app/Http/Models/Comment--}}
    </h3>
    @if (Auth::check() and ((Auth::id() == $comment->user_id) or Auth::user()->is_admin))
    {{-- аналогичная проверка на удаление--}}
    <h3 class="text_content">
        <form action="{{route('comment.destroy', $comment->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" style="color: red;">
                X
            </button>
        </form>
    </h3>
    @endif
    <p class="text_content">
        {{$comment->text_content}}
    </p>
</div>
@endforeach
@else
<p>No comments</p>
@endunless
@endsection