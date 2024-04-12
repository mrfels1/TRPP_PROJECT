@extends ('layout')

@section('content')

{{-- Вывод одного поста по id --}}
<h2>
    {{$post['title']}}
</h2>

{{--
<p>
    Автор: {{$user=app\Models\User::find[$post['user_id']]}}
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