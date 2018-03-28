@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href='{{ route('url.create.form') }}'>Add</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Short link</th>
                        <th scope="col">Original url</th>
                        <th scope="col">Count</th>
                        <th scope="col" colspan="2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($urls as $url)
                        <tr>
                            <td>
                                {{ route('visit', ['key' => $url->key]) }}
                            </td>
                            <td style="word-break:break-word;">
                                {{ $url->original_url }}
                            </td>
                            <td>
                                {{ $url->visit_count }}
                            </td>
                            <td>
                                <a href='{{ route('url.show', ['urlId' => $url->id]) }}'>Show</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('url.delete', ['urlId' => $url->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $urls->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
