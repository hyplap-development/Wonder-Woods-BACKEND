@extends('layouts.error')

@section('title', '404 Error')

@section('content')
<div class="error error-3 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(assets/media/error/bg3.jpg);">
    <div class="px-10 px-md-30 py-md-0 d-flex flex-column">
        <h1 class="error-title text-stroke text-transparent">404</h1>
        <p class="font-size-h1 font-weight-boldest text-dark-75">Sorry we can't seem to find the page you're looking for.</p>
        <p class="font-size-h4 line-height-md">There may be a misspelling in the URL entered,or the page you are looking for may no longer exist.</p>
        <a href="/" class="btn btn-primary btn-lg font-weight-boldest py-2 px-5" style="width: 20%;">Back to home</a>
    </div>
</div>
@endsection 