@extends('frontend.master')

@section('title', $data->title)
    @if($data->meta_description != '')
        @section('meta_description', $data->meta_description)
    @endif
    @if($data->meta_tags != '')
        @section('meta_keywords', $data->meta_tags)
    @endif
    @if($data->thumbnail != '')
        @section('og_image', imageRecover($data->thumbnail))
    @endif

@section('content')
<div id="fh5co-blog-section" class="fh5co-section-gray pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 heading-section animate-box">
                <div class="blog-image">
                    <img src="{{imageRecover($data->thumbnail)}}" alt="{{$data->title}}">
                </div>
                <h1 class="blog-title">{{$data->title}}</h1>
                <div class="blog-tag">
                    <span class="posted_by"> {{date('jS M, Y',strtotime($data->created_at))}} </span>
                    <span class="comment pl-2"> <a href="{{route('frontend.blogs.category',$data->category->slug)}}"> <i class="icon-folder"></i> {{$data->category->title??""}} </a></span>
                </div>
                <div class="blog-description">
                    {!! $data->description !!}
                </div>
            </div>
            <div class="col-md-4 animate-box">
                <h3> Categories </h3>
                <ul class="list-group">
                    @foreach($categories as $cat)
                    <li class="list-group-item"><a href="{{route('frontend.blogs.category',$cat->slug)}}"> <i class="icon-folder"></i> {{$cat->title}} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection