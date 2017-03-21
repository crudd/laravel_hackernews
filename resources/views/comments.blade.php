@foreach($comments as $comment)
    <ul>
        <li><a href="/user/{{ $comment->user->id }}">{{ $comment->user->name }}</a> {{ $comment->created_at->diffForHumans() }}</li>
        <li>{{ $comment->text }}</li>
        <li><a href="/item/{{ $comment->id }}">reply</a></li>
        @if($comment->allComments)
            @include('comments', ['comments' => $comment->allComments])
        @endif
    </ul>
@endforeach