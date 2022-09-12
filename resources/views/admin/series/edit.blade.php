@extends('layouts.blog')

@section('content')
<div class="mt-5">
    <div class="container">
        <form action="{{ route('series.update' , $series->slug) }}" method="post" enctype="multipart/form-data">
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Serie Name</label>
                      <input type="text"
                        class="form-control" name="title" value="{{ $series->title }}" id="" aria-describedby="helpId" placeholder="">
                      @error('title')
                      <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">Serie Image</label>
                    <input type="file"
                        class="form-control" name="image_url" id=""  aria-describedby="helpId" placeholder="">
                    </div>
                    @error('image')
                      <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                      @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Serie Description</label>
                      <textarea
                        class="form-control" name="description" id="" aria-describedby="helpId" placeholder="">
                       {{ $series->description }}
                      </textarea>
                      @error('description')
                      <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">
                Save
            </button>
        </form>
    </div>
</div>
@endsection
