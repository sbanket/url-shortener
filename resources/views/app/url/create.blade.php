@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="post" action="{{ route('url.create') }}">
                    {{ csrf_field() }}
                    <textarea name="original_url" style="width: 100%;height: 400px; "></textarea>
                    <br>
                    <input type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>
@endsection
