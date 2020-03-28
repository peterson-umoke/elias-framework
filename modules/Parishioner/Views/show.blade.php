@extends('admin::layouts.page')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('parishioner.name') !!}
    </p>
@endsection
