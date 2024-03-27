<h1>
    {{$heading}}
</h1>

@unless(count($posts) == 0)

{{-- Вывод всех постов из запроса --}}

@foreach($posts as $post)
<h2>
    <a href="/post/{{$post['id']}}">{{$post['title']}}</a>
</h2>
<p>
    {{$post['description']}}
</p>
@endforeach
@else
<p>No posts</p>
@endunless