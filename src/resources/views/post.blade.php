@extends ('layout')

@section('content')
<link href="{{ asset('allStyle.css') }}" rel="stylesheet">
@vite(['resources/css/PostStyle.css'])
@vite(['resources/js/scriptNav.js'])
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
            <div class="avtor_title">
                <h3 class="text_content">
                     {{$post->getUserName()}}:
                </h3>
                 <h2 class="title">
                        <a href="/post/{{$post->id}}">{{$post->title}}</a>
                    </h2>
                </div>
                <h3 class="center">
                    @unless(count($post->getAllTags()) == 0)
                    Tags:
                    @foreach($post->getAllTags() as $tag)
                    <span> {{$tag->text_content}}</span>
                    @endforeach
                    @endunless
                </h3>
    </div>



    <p class="text_content">
        {{$post['text_content']}} 
    </p>


    @if (Auth::check())

    <div class="post-footer">
   
        @if (Auth::check() and ((Auth::id() == $post->user_id or Auth::user()->is_admin)))
     
            <form action="{{route('post.delete', $post->id)}}" method="POST">
         
                @csrf
                @method('DELETE') {{-- POST становится DELETE, если есть возможность сразу сделай DELETE--}}
                <button type="submit" class='delete-btn basic-btn '>
                    <div class="del-text">Delete</div>
                </button>
            </form>
        @endif
        <div class="rating">
            <form method="POST" action="/post/{{$post->id}}/like">
                @csrf
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
                </button> 
            </form>

        </div>
    </div>
    @else {{-- Если пользователь не залогинен--}}
    <div class="center table">

        {{-- <div class="upvote_cnt" style="color: black; ">
            <button class="rating-button basic-btn ratingUp">
                <img src="{{ asset('up-arrow.png') }}" alt="Upvote" />
            </button>
        </div>
        <div class="downvote_cnt" style="color: black;">
            <button type="submit" class="rating-button basic-btn ratingDown">
                <img src="{{ asset('download.png') }}" alt="Upvote" />
            </button> --}}
            <div class="rating">
                <form method="POST" action="/post/{{$post->id}}/like">
                    @csrf
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
                    </button> 
                </form>
    
            </div>
        </div>
        @endif
    </div>
</div>
</div>
{{-- ШАГ 3 -> web.php строка 56--}}














@if (Auth::check())
<form method="POST" action="/post/{{$post->id}}/comment" class="center">
    @csrf
    <div class="new_post">
    {{-- <input required pattern=".*\S+.*" type="text" name="text_content"> --}}
    {{-- <input type="text" required pattern=".*\S+.*" name="text_content" placeholder="Введите ваш комментарий..." oninput="autoResize(this)"> --}}
    <textarea required pattern=".*\S+.*" name="text_content" placeholder="Введите ваш комментарий..." oninput="autoResize(this)"></textarea>
       
    {{-- вводим значения переменной text_content для запроса--}}
    <button type="submit" class="basic-btn new-btn ">
        Отправить комментарий!
    </button>
    </div>
</form>
@else
@endif

@unless(count($post->getAllComments()) == 0) 
@foreach($post->getAllComments() as $comment)

<div class="post-comment">
    <h3 class="text_content">
        {{$post->getUserName()}}:
    </h3>
    <p class="text_content">
    {{$comment->text_content}}
    </p>
    @if (Auth::check() and ((Auth::id() == $comment->user_id) or Auth::user()->is_admin))
    {{-- аналогичная проверка на удаление--}}
    <div class="post-footer">
    {{-- <h3 class="text_content"> --}}
        <form action="{{route('comment.destroy', $comment->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class='delete-btn basic-btn '>
                <div class="del-text">Delete</div>
            </button>
        </form>
    {{-- </h3> --}}
    </div>
    @endif
    
</div>
@endforeach
@else
{{-- <div class="noPost">
    <p>No comments</p>
</div> --}}
@endunless
@endsection