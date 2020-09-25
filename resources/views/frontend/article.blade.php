@extends('frontend.master')
@section('title')
<title>{{ $single_post->title }} || NewsPaper </title>
@endsection
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=599482994261379&autoLogAppEvents=1" nonce="qVpNpkxI"></script>
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
	<div class="wrapper">

		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">
					<div class="col-md-12">
                        <div class="text-right view-count">
                            <h3 style="color: black">
                                <i class="fa fa-eye"></i>
                                {{ $single_post->views+1 }}
                                @if($single_post->views != 0)
                                views
                                @else
                                view
                                @endif
                            </h3>
                        </div>
						<img src="{{ asset('images/posts/'.$single_post->image) }}" width="100%" style="margin-bottom:15px;" />
						<h3 style="color: black">{{ $single_post->title }}</h3>
						<p align="justify">{!! $single_post->description !!}</p>

                    </div>

                    <div class="col-md-12">
                        <div class="share-this">
                        <h3 style="color: black">Share this...</h3>
                       <span class="share">
                            <div class="fb-share-button" data-href="{{ route('article.read',$single_post->slug) }}" data-layout="button" data-size="small"></div>
                        <a class="twitter-share-button" data-size="small" href="https://twitter.com/intent/tweet">Tweet</a>
                       </span>
                        <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
                        <script type="IN/Share" data-url="{{ route('article.read',$single_post->slug) }}"></script>
                    </div>
                    </div>
					<div class="row">
						<div class="col-md-12">
							<h3 style="color: black">You May Also Like</h3>
                        </div>
                         @if($related_post->count()>0)
                        @foreach ($related_post->take(3) as $related)
						<div class="col-md-4">
                            <a href="{{ route('article.read',$related->slug) }}"><img style="height: 200px" src="{{ asset('images/posts/'.$related->image) }}" width="100%" style="margin-bottom:15px;" /></a>
                            <a href="{{ route('article.read',$related->slug) }}""> <h4 style="color: black">{{ $related->title }}</h4></a>
							<p align="justify">{!! substr($related->description,0,100) !!}<a href="{{ route('article.read',$related->slug) }}">... Read more &raquo;</a></p>
                        </div>
                        @endforeach
                        @endif
					</div>
				</div>
			</div>

<!-- right section -->
			<div class="col-md-4">
				<div class="col-md-12" style="padding:15px;">

					 @include('frontend.more_news')

				</div>
			</div>
		</div>
	</div>

@endsection
