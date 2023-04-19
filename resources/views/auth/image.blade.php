@extends('layouts.app')

@section('content')

    @if (\Session::has('success'))
        <img src="{{\Session::get('image')}}" />
        <h2>{{\Session::get('message')}}</h2>
        <h2>{{\Session::get('message')}}</h2>
    @endif

    <div class="container w-50 mt-5">
        <form method="post" action="/image" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input class="form-control" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
