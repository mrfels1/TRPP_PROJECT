<div class="post">
    <h2 class="title">
        <a href="/post/{{$post['id']}}">{{$post['title']}}</a>
    </h2>
    <h3 class="text_content">
        Автор: {{$post->getUserName()}}
    </h3>
    <p class="text_content">
        {{$post['text_content']}}
    </p>
    @if (Auth::check())
    <div class="center table">

        <div class="upvote_cnt">
            <form method="POST" action="/post/{{$post->id}}/like">
                @csrf
                <button type="submit" style="{{$post->isLikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                    [▲] {{$post->likes ?:0}}
                </button>
            </form>
        </div>

        <div class="downvote_cnt">
            <form method="POST" action="/post/{{$post->id}}/like">
                @csrf
                @method('DELETE')
                <button type="submit" style="{{$post->isDislikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
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