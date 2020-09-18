@include('frontend.partials.style')

<body>
    <div class="col-md-12 top" id="top">
        <div class="col-md-9 top-left">
            <div class="col-md-3">
                <span class="day">{{ date('l,M d,Y') }}</span>
            </div>
            <div class="col-md-9">
                <span class="latest">Latest: </span> <a href="{{ route('article.read',$latest_news->slug) }}">{{ $latest_news->title }}</a>
            </div>
        </div>
        <div class="col-md-3 top-social">
            @foreach($a as $key=> $b)

                <a href="{{ $b }}" class="social-icon"> <i class="fa fa-{{ $icons[$key] }}"></i></a>
            @endforeach

        </div>
    </div>

    <div class="col-md-12 brand">
        <div class="col-md-4 name">
            @foreach($settings as $setting)

                <img src="{!! asset('images/settings/'.$setting->image) !!}" width="100">
            @endforeach

        </div>
        <div class="col-md-8">
            <img src="images/final-news-site_06.gif" width="100%" />
        </div>
    </div>

    <div class="col-md-12 main-menu">
        <div class="col-md-10 menu">
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand">
                        <font color="#555555">COLOR</font>
                        <font color="#2ca0c9">MAG</font>
                    </span>
                </div>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="nav nav-justified">
                        <li><a href="{{ url('/') }}" class="active"><span
                                    class="glyphicon glyphicon-home"></span></a></li>
                        @foreach($categories as $category)
                            <li><a href="{{ url('category') }}/{{ $category->slug }}"
                                    class="text-uppercase">{{ $category->category_name }}</a></li>
                        @endforeach


                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-md-2 search">
            <input type="search" class="form-control" /><span class="glyphicon glyphicon-search btn"></span>
        </div>
    </div>
    {{-- Header end here --}}
    @yield('content')
    {{-- foorter start from here --}}
    <div class="col-md-12 bottom">
        <div class="col-md-4">
            <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">About Us</span></h3>
            @foreach($settings as $setting)
                <span class="name">
                    <img src="{!! asset('images/settings/'.$setting->image) !!}" width="100">


                </span>
                <p align="justify">{{ $setting->about }}</p>
        </div>
        @endforeach
        <div class="col-md-4">
            <div class="col-md-12">
                <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">Quick Links</span>
                </h3>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <ul class="nav">
                        @foreach ($categories as $key=>$category)
                        @if ($key<4)

                        <li><a href="{{ url('category') }}/{{ $category->slug }}"class="text-uppercase">{{ $category->category_name }}</a></li>

                         @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <ul class="nav">
                         @foreach ($categories as $key=>$category)
                        @if ($key>3)

                        <li><a href="{{ url('category') }}/{{ $category->slug }}"class="text-uppercase">{{ $category->category_name }}</a></li>

                         @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">Contact Us</span></h3>
            {{-- <span class="name">
                <font color="#e03521">COLOR</font>
                <font color="#fff">MAG</font>
            </span><br /> --}}
            Follow us at:<br /><br />
            @foreach($a as $key=> $b)

                <a href="{{ $b }}" class="social-icon"> <i class="fa fa-{{ $icons[$key] }}"></i></a>
            @endforeach<br />
            <a href="#top" class="btn btn-default goto"><span class="glyphicon glyphicon-arrow-up"></span></a><br />
        </div>
    </div>

    <div class="col-md-12 text-center copyright">
        Copyright &copy; {{ date('Y') }} <a href="#">COLORMAG</a> Powered by: <a
            href="#">DREAMTEAM</a>
    </div>

    @include('frontend.partials.script')
</body>

</html>
