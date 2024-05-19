@extends('layouts.error')

@section('title', '403 Error')

@section('content')
<div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(assets/media/error/bg6.jpg);">
    <div class="d-flex flex-column flex-row-fluid text-center">
        <h1 class="error-title font-weight-boldest text-white mb-12" style="font-size: 70px; margin-top: 8rem;">403 : Access is denied</h1>
        <p class="display-3 font-weight-bold text-white">Looks like you were not expected here.</p>
        <p class="display-4 font-weight-bold text-white">Unfortunately we were forced to unplug you.</p>
        <!-- <a href="/" class="btn btn-primary btn-lg font-weight-boldest py-2 px-5" style="width: 20%;">Back to home</a> -->
    </div>
</div>
@endsection