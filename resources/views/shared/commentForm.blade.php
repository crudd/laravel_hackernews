<form action="/item/{{ $item->id }}/comment" method="post">
    {!! csrf_field() !!}
    <div><textarea rows="6" cols="60" id="text" name="text"></textarea></div>
    <input type="hidden" id="parent" name="parent" value="{{ $item->id }}">
    @if (!Auth::guest())
    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
    @endif
    <button type="submit" class="btn btn-default">Add comment</button>
<form><br><br>