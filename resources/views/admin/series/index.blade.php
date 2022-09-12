@extends('layouts.blog')

@section('content')
    <div>
        <div class="main_image_container" style='background-image:url({{-- $series->image_url --}})'>
            <div>
                <h1>Serires Page</h1>
                <h5>Can Chose The Your Viedos </h1>
            </div>
        </div>
        <div class="container">
            <div class="custom_container">
                <div class="mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>description</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($series as $ser )
                                <tr>
                                    <td >{{ $ser->id }}</td>
                                    <td>{{ $ser->title }}</td>
                                    <td>{{ $ser->description }}</td>
                                    <td>
                                        <a href="{{ route('series.edit' , $ser->slug) }}" class="btn btn-outline-info btn-sm">edit </a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
