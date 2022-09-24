@extends('layouts.blog')

@section('content')
<div>
    <div class="main_image_container" style='color:red; backgrounnd-image:url({{ $series->image_url }})'>
        <div>
            <h1>{{ $series->title }}</h1>
            <h5>{{ $series->description }}</h1>
                @auth
                    <div class="text-center">
                        @hasStartedSeries($series)
                            <a href="{{ route('watch.series', $series->id) }}" class="btn btn-light mt-5"> Continuo Now</a>
                        @else
                            <a href="{{ route('watch.series', $series->id) }}" class="btn btn-light mt-5"> Start Now</a>
                        @endhasStartedSeries

                    </div>
                @endauth
        </div>
    </div>
    <div class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-center">
                        @php
                            $NextLessonRoute = $PreviosLessonRoute ='';
                            if($lesson->hasNext()) $NextLessonRoute = route('watch.series.lesson' ,  ['get_series' => $series->id, 'lesson' => $lesson->getNext()->id ]) ;
                            if($lesson->hasPrevious()) $PreviosLessonRoute =  route('watch.series.lesson' ,  ['get_series' => $series->id, 'lesson' => $lesson->getPrevious()->id ]);
                        @endphp
                        <vue-player defualt_lesson="{{ $lesson }}" next_url='{{ $NextLessonRoute }}' ></vue-player>
                        <div class="d-flex justify-content-between">
                            @if($lesson->getNext())
                            <a href="{{  $NextLessonRoute }}" class="btn btn-sm btn-outline-primary">
                                Next Lesson
                            </a>
                            @endif
                            @if($lesson->getPrevious())
                            <a href="{{ $PreviosLessonRoute }}" class="btn btn-sm btn-outline-success">
                                Prevoiues Lesson
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-5">
                        <div>
                            <div class="pb-5">
                                <div class="d-flex justify-content-between">
                                    <div class="col-md-6">

                                        {{-- <create-lesson :seriesid='lessons[0].series_id'></create-lesson> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="custom_head"><span> Lessons </span></h6>
                                    </div>
                                </div>
                                @forelse ($series->getLessonOrderByEpesdeo() as $Lesson)
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
                                            <div class="latest_post
                                            @if(auth()->check())
                                            {{ !auth()->user()->hasCompleatedLesson($Lesson) ?: 'watched' }}
                                            @endif
                                            "
                                             style='margin-top:1px'>
                                                <div class="latest_post_data ">
                                                    <div>
                                                        <h6>
                                                            <a href="{{ route('watch.series.lesson', ['lesson' =>$Lesson->id , 'get_series' => $Lesson->Series->id ]) }}" class="">
                                                                {{ $Lesson->title }}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div>
                                                    </div>
                                                    {{-- <a href="{{ route('front.series.show', $Serie->id) }}">watch viedo</a> --}}
                                                </div>
                                                <div class="latest_post_img">
                                                    <a href="{{ route('watch.series.lesson', ['lesson' =>$Lesson->id , 'get_series' => $Lesson->Series->id ]) }}" class="index_link">
                                                        <img src="{{ $Lesson->image_url }}" style="width: 50px; height:30px"
                                                            alt="not found" class="" />
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
        </div>
    </div>
    <div class="container">
        <div class="custom_container">

        </div>
    </div>
</div>
@endsection
