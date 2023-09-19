@extends('frontend.master')

@section('title', 'Home')

@section('content')

    <!-- end:header-top -->

    <div class="fh5co-hero">
        <div class="fh5co-overlay"></div>
        <div class="fh5co-cover" data-stellar-background-ratio="0.5"
            style="background-image: url({{ asset('assets/frontend/images/cover_bg_1.jpg') }});">
            <div class="desc">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <div class="tabulation animate-box">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#flights" aria-controls="flights" role="tab"
                                            data-toggle="tab">Flights</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Hotels</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#packages" aria-controls="packages" role="tab"
                                            data-toggle="tab">Packages</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="flights">
                                        <div class="row">
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <div class="input-field">
                                                    <label for="from">From:</label>
                                                    <input type="text" class="form-control" id="from-place"
                                                        placeholder="Los Angeles, USA" />
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <div class="input-field">
                                                    <label for="from">To:</label>
                                                    <input type="text" class="form-control" id="to-place"
                                                        placeholder="Tokyo, Japan" />
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="date-start">Check In:</label>
                                                    <input type="text" class="form-control" id="date-start"
                                                        placeholder="mm/dd/yyyy" />
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="date-end">Check Out:</label>
                                                    <input type="text" class="form-control" id="date-end"
                                                        placeholder="mm/dd/yyyy" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt">
                                                <section>
                                                    <label for="class">Class:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>Economy</option>
                                                        <option value="economy">Economy</option>
                                                        <option value="first">First</option>
                                                        <option value="business">Business</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <section>
                                                    <label for="class">Adult:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <section>
                                                    <label for="class">Children:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="submit" class="btn btn-primary btn-block"
                                                    value="Search Flight">
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="hotels">
                                        <div class="row">
                                            <div class="col-xxs-12 col-xs-12 mt">
                                                <div class="input-field">
                                                    <label for="from">City:</label>
                                                    <input type="text" class="form-control" id="from-place"
                                                        placeholder="Los Angeles, USA" />
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="date-start">Return:</label>
                                                    <input type="text" class="form-control" id="date-start"
                                                        placeholder="mm/dd/yyyy" />
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="date-end">Check Out:</label>
                                                    <input type="text" class="form-control" id="date-end"
                                                        placeholder="mm/dd/yyyy" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt">
                                                <section>
                                                    <label for="class">Rooms:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="economy">1</option>
                                                        <option value="first">2</option>
                                                        <option value="business">3</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <section>
                                                    <label for="class">Adult:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <section>
                                                    <label for="class">Children:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="submit" class="btn btn-primary btn-block"
                                                    value="Search Hotel">
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="packages">
                                        <div class="row">
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <div class="input-field">
                                                    <label for="from">City:</label>
                                                    <input type="text" class="form-control" id="from-place"
                                                        placeholder="Los Angeles, USA" />
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <div class="input-field">
                                                    <label for="from">Destination:</label>
                                                    <input type="text" class="form-control" id="to-place"
                                                        placeholder="Tokyo, Japan" />
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="date-start">Departs:</label>
                                                    <input type="text" class="form-control" id="date-start"
                                                        placeholder="mm/dd/yyyy" />
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="date-end">Return:</label>
                                                    <input type="text" class="form-control" id="date-end"
                                                        placeholder="mm/dd/yyyy" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt">
                                                <section>
                                                    <label for="class">Rooms:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="economy">1</option>
                                                        <option value="first">2</option>
                                                        <option value="business">3</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <section>
                                                    <label for="class">Adult:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <section>
                                                    <label for="class">Children:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="submit" class="btn btn-primary btn-block"
                                                    value="Search Packages">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="desc2 animate-box">
                            <div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
                                <h2>Welcome to {{readconfig('site_name')}}</h2>
                                <h3>{{readConfig('sub_title')}}</h3>
                                {{-- <span class="price">Go</span> --}}
                                <p><a class="btn btn-primary btn-lg" href="{{url('pages/contact')}}">Get Started</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>Our Tour Packages</h3>
                    <p>Plan your dream gateway and choose from uncountable tour packages at {{readconfig('site_name')}}. Book our holiday packages for the best deals on any international trip.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                    <div href="{{url('pages/contact')}}"><img src="{{ asset('assets/frontend/images/place-1.jpg') }}"
                            alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                        <div class="desc">
                            <span></span>
                            <h3>New York</h3>
                            <span>3 nights + Flight 5*Hotel</span>
                            {{-- <span class="price">$1,000</span> --}}
                            <a class="btn btn-primary btn-outline" href="{{url('pages/contact')}}">Book Now <i
                                    class="icon-arrow-right22"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                    <div href="{{url('pages/contact')}}"><img src="{{ asset('assets/frontend/images/place-2.jpg') }}"
                            alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                        <div class="desc">
                            <span></span>
                            <h3>Philippines</h3>
                            <span>4 nights + Flight 5*Hotel</span>
                            {{-- <span class="price">$1,000</span> --}}
                            <a class="btn btn-primary btn-outline" href="{{url('pages/contact')}}">Book Now <i
                                    class="icon-arrow-right22"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                    <div href="{{url('pages/contact')}}"><img src="{{ asset('assets/frontend/images/place-3.jpg') }}"
                            alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                        <div class="desc">
                            <span></span>
                            <h3>Hongkong</h3>
                            <span>2 nights + Flight 4*Hotel</span>
                            {{-- <span class="price">$1,000</span> --}}
                            <a class="btn btn-primary btn-outline" href="{{url('pages/contact')}}">Book Now <i
                                    class="icon-arrow-right22"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center animate-box">
                    <p><a class="btn btn-primary btn-outline btn-lg" href="{{url('pages/contact')}}">See All Offers <i
                                class="icon-arrow-right22"></i></a></p>
                </div>
            </div>
        </div>
    </div>
    <div id="fh5co-blog-section" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>Latest Blog Updates</h3>
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
                                <span class="posted_by"> {{date('jS M, Y',strtotime($blog->created_at))}} </span>
                                <span class="comment"><a href="{{route('frontend.blogs.category',$blog->category->slug)}}"><i class="icon-folder"></i> {{$blog->category->title??""}} </a></span>
                                <p><a href="{{route('frontend.blog.show',$blog->slug)}}">Learn More...</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                @endforeach
            </div>

            <div class="col-md-12 text-center animate-box">
                <p><a class="btn btn-primary btn-outline btn-lg" href="{{route('frontend.blogs')}}">See All Blogs <i
                            class="icon-arrow-right22"></i></a></p>
            </div>

        </div>
    </div>
    


    <div id="fh5co-destination">
        <div class="tour-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul id="fh5co-destination-list" class="animate-box">
                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-1.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Los Angeles</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-2.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Hongkong</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-3.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Italy</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-4.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Philippines</h2>
                                </div>
                            </a>
                        </li>

                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-5.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Japan</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-half text-center">
                            <div class="title-bg">
                                <div class="case-studies-summary">
                                    <h2>Most Popular Destinations</h2>
                                    <span><a href="{{url('pages/contact')}}">View All Destinations</a></span>
                                </div>
                            </div>
                        </li>
                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-6.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Paris</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-7.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Singapore</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-8.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Madagascar</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-9.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Egypt</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center"
                            style="background-image: url({{ asset('assets/frontend/images/place-10.jpg') }}); ">
                            <a href="{{url('pages/contact')}}">
                                <div class="case-studies-summary">
                                    <h2>Indonesia</h2>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
