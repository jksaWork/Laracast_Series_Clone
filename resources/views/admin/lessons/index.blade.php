@extends('layouts.blog')
@section('content')
<div >
    <div class="main_image_container" style='background-image:url({{ $series->image_url }})'>
        <div>
            <h1>{{ $series->title }}</h1>
            <h5>{{ $series->description }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="custom_container">
            <div class="mt-5">
                <lesson-list default_lessons='{{$series->Lessons}}'> </lesson-list>
            </div>
        </div>
    </div>
</div>
@endsection
