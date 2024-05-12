<div class="post">
    <div class="post-header">
    <img src="Assets/Blackuser.png" alt="User Icon" class="user-icon" />
    <h2 class="title">
        <a href="/post/{{$post['id']}}">{{$post['title']}}</a>
    </h2>
    <h3 class="text_content">
        Автор: {{$post->getUserName()}}
    </h3>
    <p class="text_content">
        {{$post['text_content']}}
    </p>
    
            
    </div>
    @if (Auth::check())
    <div class="center table">

        <div class="upvote_cnt">
            <form method="POST" action="/post/{{$post->id}}/like">
                @csrf
                
                <button class="rating-button basic-btn ratingUp">
                    <img src="{{ asset('up-arrow.png') }}" alt="Upvote"/> {{$post->likes ?:0}}
                </button>


            </form>
        </div>

        <div class="downvote_cnt">
            <form method="POST" action="/post/{{$post->id}}/like">
                @csrf
                @method('DELETE')
                <button class="rating-button basic-btn ratingDown">
                    <img src="Assets/download.png" alt="Downvote"/> 
                    {{$post->dislikes ?:0}}
                  </button>


            </form>
        </div>
        <div class="comment_cnt" style="color: black;">
            Комм: {{$post->comments ?:0}}</div>

    </div>
    @else
    <div class="center table">

        <div class="upvote_cnt" style="color: black; ">
            <!-- [▲] {{$post->likes ?:0}}</div> -->
            <img src="Assets/up-arrow.png" alt="Upvote"/>{{$post->likes ?:0}}</div>
        <div class="downvote_cnt" style="color: black;">
            <!-- [▼] {{$post->dislikes ?:0}}</div> -->
            <img src="Assets/download.png" alt="Downvote"/>  {{$post->dislikes ?:0}}</div>
        <div class="comment_cnt" style="color: black;">
            Комм: {{$post->comments ?:0}}</div>

    </div>
    @endif
</div>