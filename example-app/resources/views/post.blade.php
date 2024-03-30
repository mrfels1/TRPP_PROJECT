@extends ('layout')

@section('content')

{{-- Вывод одного поста по id --}}
<h2>
    {{$post['title']}}
</h2>

{{-- Придумать вывод автора поста
<p>
    Автор: {{$user=User::find[1]}}
</p>
--}}


<p>
    Теги: {{$post['tags']}}
</p>
<p>
    {{$post['text_content']}}
</p>
<table>
    <tr>
        <th>[▲] {{$post['upvotes']}}</th>
        <th>[▼] {{$post['downvotes']}}</th>
    </tr>
</table>
@endsection