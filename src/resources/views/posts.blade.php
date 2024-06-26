<link href="{{ asset('allStyle.css') }}" rel="stylesheet">
@vite(['resources/css/PostStyle.css'])
@extends ('layout')

@section('content')



@unless(count($posts) == 0)
<div class="forum-content">
    <aside style="padding-top: 0px">

        {{-- Боковая панель (сайдбар) --}}

        <div class="popular-topics-panel">
            <nav>
                <h2 style="text-align: center">Топ популярных тегов:</h2>
                <span class="topic-b"></span>
                <ul>

                    @foreach($popular_tags as $tag)
                    <div class="topic-item">
                        <li class="tag-item">
                            <span class="topic-circle"></span>
                            <a href="/posts/?tag={{$tag->text_content}}">{{$tag->text_content}}
                            </a>
                        </li>
                    </div>
                    @endforeach
                </ul>
            </nav>
        </div>
    </aside>

    {{-- Вывод всех постов из запроса. Управляется из web.php "route /posts" --}}
    <div class="user-posts">
        @foreach($posts as $post)

        <div class="post">
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
                {{$post->text_content}}
            </p>


            @if (Auth::check())
            <div class="post-footer">

                <div class="rating">

                    <form method="POST" action="/post/{{$post->id}}/like">
                        @csrf
                        <button type="submit" class="rating-button basic-btn ratingUp"
                            style="{{$post->isLikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                            <img src="{{ asset('up-arrow.png') }}" alt="Upvote" />
                        </button>
                    </form>

                    <span> {{($post->likes ?:0) - ($post->dislikes ?:0)}}</span>

                    <form method="POST" action="/post/{{$post->id}}/dislike">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rating-button basic-btn ratingDown"
                            style="{{$post->isDislikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                            <img src="{{ asset('download.png') }}" alt="Upvote" />
                        </button>
                    </form>

                </div>
                <div class="comment_cnt" style="color: black;">
                    <img src="{{ asset('chat.png') }}" alt="Upvote" /> <span>{{$post->comments ?:0}}</span>
                </div>



                @else
                <div class="center table">
                    <button type="submit" class="rating-button basic-btn ratingUp" style="color: black;">
                        <img src="{{ asset('up-arrow.png') }}" alt="Upvote" />
                    </button>
                    <span> {{$post->likes ?:0}}</span>
                    <button type="submit" class="rating-button basic-btn ratingDown" style="color: black;">
                        <img src="{{ asset('download.png') }}" alt="Upvote" />
                    </button>
                    <div class="comment_cnt" style="color: black;">
                        Комм: {{$post->comments ?:0}}</div>
                </div>
                @endif
            </div>
        </div>

        @endforeach

        @else
        <div class="noPost">
            <p>No posts</p>
        </div>
        @endunless
        @endsection
    </div>