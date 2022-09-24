@extends('layouts.blog')

@section('content')
    <div>
        <div class="main_image_container" style=''>
            <div>
                <h1>Profile </h1>
                <h5>{{ $user->name }} </h5>
                <div class="mt-4">
                    <h1>Completed Lesson </h1>
                    <h5>{{ $completed_lesson }} </h5>
                </div>
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
                                <div class="col-md-6 ">
                                    <h2 class="custom_head"><span> Series  Watched  </span></h2>
                                </div>
                            </div>
                            @forelse ($series as $Serie)
                                <div>
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
                                                    <span href="" class="index_link">
                                                        {{ $Serie->description }}
                                                    </span>
                                                </div>
                                                <a href="{{ route('front.series.show', $Serie->id) }}">read more</a>
                                            </div>
                                            <div class="latest_post_img">
                                                <a href="{{ route('front.series.show' , $Serie->id) }}" class="index_link">
                                                    <img src="{{  $Serie->image_url }}"
                                                    style="width: 170px; height:170px"
                                                        alt="not found" class="p-2" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @empty
                        Not Foud Series
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
