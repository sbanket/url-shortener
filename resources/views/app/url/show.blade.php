@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <a href='{{ route('url.list') }}'>Back to list</a>
                </div>
                <div class="row">
                    <table>
                        <tr>
                            <td>Short url:  {{ route('visit', ['key' => $url->key]) }}</td>
                        </tr>
                        <tr>
                            <td style="word-break:break-word;">Original url: {{ $url->original_url }}</td>
                        </tr>
                        <tr>
                            <td>Count: {{ $url->visit_count }}</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <h4>Logs</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Ip</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td>
                                    {{ $log->ip }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
