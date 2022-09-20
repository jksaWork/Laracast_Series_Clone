@extends('layouts.blog')

@section('content')
    <div>
        <div class="main_image_container" style='backgrounnd-image:url({{ $series->image_url }})'>
            <div>
                <h1>{{ $series->title }}</h1>
                <h5>{{ $series->description }}</h1>
                    @auth
                        <div class="text-center">
                            @hasStartedSeries($series)
                                <a href="{{ route('watch.series' , $series->id) }}" class="btn btn-light mt-5"> Continuo Now</a>
                            @else
                                <a href="{{ route('watch.series' , $series->id) }}" class="btn btn-light mt-5"> Start Now</a>
                            @endhasStartedSeries

                        </div>
                    @endauth
            </div>
        </div>
        <div class="container">
            <div class="custom_container">
                <div class="mt-5">
                    <div>
                        <div class="pb-5">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">

                                    {{-- <create-lesson :seriesid='lessons[0].series_id'></create-lesson> --}}
                                </div>
                                <div class="col-md-6">
                                    <h2 class="custom_head"><span> Series </span></h2>
                                </div>
                            </div>
                            @forelse ($series->Lessons as $Serie)
                                <div>
                                    {{-- <div class="pb-5">
                                <div class="d-flex justify-content-between">
                                    <div class="col-md-6">

                                        <create-lesson  seriesid='lessons[0].series_id'></create-lesson>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="custom_head"><span> Lessons </span></h2>
                                    </div>

                                </div> --}}
                                    <div class="latest_post_container p-2">
                                        <div class="latest_post" style='margin-top:20px'>
                                            <div class="latest_post_data">
                                                <div>
                                                    <h2>
                                                        <a href="#" class="">
                                                            {{ $Serie->title }}
                                                        </a>
                                                    </h2>
                                                </div>
                                                <div>
                                                    {{-- <span href="" class="index_link">
                                                    {{ $Serie->description }}
                                                </span> --}}
                                                </div>
                                                <a href="{{ route('front.series.show', $Serie->id) }}">watch viedo</a>
                                            </div>
                                            <div class="latest_post_img">
                                                <a href="{{ route('front.series.show', $Serie->id) }}" class="index_link">
                                                    <img src="{{ $Serie->image_url }}" style="width: 130px; height:100px"
                                                        alt="not found" class="p-2" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                hello
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
