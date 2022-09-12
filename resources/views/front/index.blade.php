@extends('layouts.blog')

@section('content')
    <div>
        <div class="main_image_container" style=''>
            <div>
                <h1>Series Page</h1>
                <h5>Chose Aprobrate Series To You The Seires Page</h1>
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
                            @forelse ($series as $Serie)
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
                                    <div class="latest_post_container">
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
                                                    <a href="#" class="index_link">
                                                        {{ $Serie->description }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="latest_post_img">
                                                <a href="{{ route('series.show' , $Serie->slug) }}" class="index_link">
                                                    <img src="{{  $Serie->image_url }}"
                                                    style="width: 200px; height:170px"
                                                        alt="not found" class="p-2" />
                                                </a>
                                            </div>
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
    </div>
@endsection
