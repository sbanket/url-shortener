@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4>Hello</h4>
                <p>You can add new short link.</p>

                @if (!Auth::guest())
                    <a href='{{ route('url.list') }}'>See urls</a>
                @endif
            </div>
        </div>
    </div>
@endsection
