@extends('layouts.admin')

@section('title')
    Admin
@endsection

@section('content')
    <div class="container-fluid p-5">
        @include('admin.stats')
        @include('admin.logs')
        @include('admin.posts')
        @include('admin.messages')
    </div>
@endsection
