@extends('frontend.master')

@if(isset($category))
@section('title', $category->title)
    @if($category->description != '')
        @section('meta_description', $category->description)
    @endif
    @if($category->keywords != '')
        @section('meta_keywords', $category->keywords)
    @endif
@else
    @section('title', 'Blogs')
@endif

@section('content')
<div id="fh5co-blog-section" class="fh5co-section-gray pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h3>Our Blogs 
                    @if(isset($category))
                    <br> <small> <i class="icon-folder"></i> {{$category->title}}</small> 
                    @endif
                </h3>
                <p>Stay in the know with our most recent blog posts. Explore thought-provoking articles, insightful tips, and the latest trends in our field. Don't miss out on the latest insights from our blog.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-bottom-padded-md">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="fh5co-blog animate-box blog-box">
                    <a href="{{route('frontend.blog.show',$blog->slug)}}"><img class="img-responsive blog-img" src="{{ imageRecover($blog->thumbnail) }}"
                        alt="{{$blog->title}}"></a>
                    <div class="blog-text">
                        <div class="prod-title">
                            <h3><a href="{{route('frontend.blog.show',$blog->slug)}}">{{$blog->title}}</a></h3>
                            <span class="posted_by">{{date('jS M, Y',strtotime($blog->created_at))}} </span>
                            <span class="comment"><a href="{{route('frontend.blogs.category',$blog->category->slug)}}"><i class="icon-folder"></i> {{$blog->category->title??""}}</a></span>
                            <p><a href="{{route('frontend.blog.show',$blog->slug)}}">Learn More...</a></p>
                        </div>
                    </div> 
                </div>
            </div>
            @endforeach
            <div class="clearfix visible-md-block"></div>
        </div>

    </div>
</div>
@endsection