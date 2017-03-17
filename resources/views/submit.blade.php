@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Submit A Link</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops! Something went wrong!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/submit" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{!! old('title') !!}">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{!! old('url') !!}">
                </div>
                <div><p>or</p></div>
                <div class="form-group">
                    <label for="description">Text</label>
                    <textarea class="form-control" id="description" name="text" placeholder="" value="{!! old('text') !!}"></textarea>
                </div>
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-default">Submit</button>
                <p>Leave url blank to submit a question for discussion. If there is no url, the text (if any) will appear at the top of the thread.</p>
            </form>
        </div>
    </div>
@endsection