@extends ('layout')

@section('content')
<link href="{{ asset('allStyle.css') }}" rel="stylesheet">
@vite(['resources/css/SinglePostStyle.css'])
<style>
    .post {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        width: 97%;
        margin-left: 20px;
    }
</style>
{{--
    Вывод одного поста по id
    Шаг 2 -> post.blade.php строка 126
--}}

<div class="post single">
    <div class="post-header">
        <h3 class="text_content">
            Автор: {{$post->getUserName()}}
            {{-- Вывод имени автора поста выполняется функцией getUserName, которая расположена в app/Http/Models/Post--}}
        </h3>
        <div class="tag_title">
            <h2 class="title">
                <a href="/post/{{$post['id']}}">{{$post['title']}}</a>
            </h2>

            <h3 class="center">
                @foreach($post->getAllTags() as $tag)
                <span>tag:{{$tag->text_content}}</span>
                @endforeach
            </h3>
        </div>
    </div>



    <p class="text_content">
        {{$post['text_content']}} {{-- Вывод аналогичный post->text_content --}}
    </p>



    {{-- Если пользователь залогинен то может лайк/дизлайк поставить--}}
    @if (Auth::check())

    <div class="post-footer">
        {{-- Удаление поста --}}
        @if (Auth::check() and ((Auth::id() == $post->user_id or Auth::user()->is_admin)))
        {{-- Проверка залогинен ли пользователь и является ли он автором --}}
        <h3 class="text_content">
            <form action="{{route('post.delete', $post->id)}}" method="POST">
                {{-- При подтверждении вызывается POST post.delete из web.php и в запросе передаётся id поста --}}
                @csrf
                @method('DELETE') {{-- POST становится DELETE, если есть возможность сразу сделай DELETE--}}
                <button type="submit" class='delete-btn basic-btn '>
                    <div class="del-text">Delete</div>
                </button>
            </form>
        </h3>
        @endif
        <div class="rating">
            {{-- <div class="upvote_cnt"> --}}
            <form method="POST" action="/post/{{$post->id}}/like">
                {{-- При подтверждении вызывается POST /post/{{$post->id}}/like из web.php--}}
                @csrf
                {{-- Если пост лайкнут текущим пользователем, кнопка зелёная, иначе чёрная--}}
                <button type="submit" style="{{$post->isLikedBy(auth()->user())?'color: green;' : 'color: black;'}}">

                    <button class="rating-button basic-btn ratingUp">
                        <img src="{{ asset('up-arrow.png') }}" alt="Upvote" />
                    </button>
                </button>
            </form>

            <span> {{$post->likes ?:0}}</span>


            <form method="POST" action="/post/{{$post->id}}/like">
                @csrf
                @method('DELETE')
                <button type="submit" class="rating-button basic-btn ratingDown"
                    style="{{$post->isDislikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                    <img src="{{ asset('download.png') }}" alt="Upvote" />
                </button> <!-- {{$post->dislikes ?:0}} -->
            </form>

        </div>
    </div>
    @else {{-- Если пользователь не залогинен--}}
    <div class="center table">

        <div class="upvote_cnt" style="color: black; ">
            <button class="rating-button basic-btn ratingUp">
                <img src="{{ asset('up-arrow.png') }}" alt="Upvote" />
            </button>
        </div>
        <div class="downvote_cnt" style="color: black;">
            <button type="submit" class="rating-button basic-btn ratingDown">
                <img src="{{ asset('download.png') }}" alt="Upvote" />
            </button>

        </div>
        @endif
    </div>
</div>
</div>
{{-- ШАГ 3 -> web.php строка 56--}}
@if (Auth::check())
<form method="POST" action="/post/{{$post->id}}/comment" class="center"> {{-- см. web.php--}}
    @csrf
    <input required pattern=".*\S+.*" type="text" name="text_content">
    {{-- вводим значения переменной text_content для запроса--}}
    <button type="submit" class="basic-btn ">
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
                x
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
<div class="noPost">
    <p>No comments</p>
</div>
@endunless
@endsection