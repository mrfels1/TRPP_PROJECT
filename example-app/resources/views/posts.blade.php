@extends ('layout')

@section('content')

<style>
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
</style>

@unless(count($posts) == 0)

{{-- Вывод всех постов из запроса. Управляется из web.php "route /posts" --}}

@foreach($posts as $post)
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
    <table class="center">
        <tr>
            <th>
                <form method="POST" action="/post/{{$post->id}}/like">
                    @csrf
                    <button type="submit"
                        style="{{$post->isLikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                        [▲] {{$post->likes ?:0}}
                    </button>
                </form>
            </th>

            <th>
                <form method="POST" action="/post/{{$post->id}}/like">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        style="{{$post->isDislikedBy(auth()->user())?'color: green;' : 'color: black;'}}">
                        [▼] {{$post->dislikes ?:0}}
                    </button>
                </form>
            </th>

        </tr>
    </table>
    @else
    <table class="center">
        <tr>
            <th style="color: black;">
                [▲] {{$post->likes ?:0}}</th>

            <th style="color: black;">
                [▼] {{$post->dislikes ?:0}}</th>
        </tr>
    </table>
    @endif

</div>

@endforeach
@else
<p>No posts</p>
@endunless
@endsection