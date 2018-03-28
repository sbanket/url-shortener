@extends('layouts.app')

@section('content')
    <div class="ex-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="message-box">
                        <h1 class="m-b-0">
                            @if (empty($exception))
                                404: Not found
                            @else
                                {{ $exception->getMessage() }}
                            @endif

                        </h1>
                        <div class="buttons-con">
                            <div class="action-link-wrap">
                                <a href="javascript:history.back()"
                                   class="btn btn-custom btn-primary waves-effect waves-light m-t-20">Назад</a>
                                <a href="/"
                                   class="btn btn-custom btn-primary waves-effect waves-light m-t-20">Главная</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
