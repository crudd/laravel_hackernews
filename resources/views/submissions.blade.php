@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($items)
                @include('shared.item_list')
            @endif
        </div>
    </div>
@endsection