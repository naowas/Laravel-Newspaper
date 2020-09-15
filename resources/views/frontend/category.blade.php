@extends('frontend.master')
@section('content')

	<div class="wrapper">

		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">
					<div class="col-md-12">
						<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px; text-transform:uppercase"><span style="padding:6px 12px; background:#81d742;" >{{ $cat->category_name }}</span></h3>
                    </div>
                    @if($posts->count()>0)
                    @foreach ($posts as $key=>$post)
                    @if($key==0)
					<div class="col-md-12">
						<img src="{{ asset('images/posts/'.$post->image) }}" width="100%" style="margin-bottom:15px;" />
                        <p align="justify">{!! $post->description !!}</p>


                     @endif
                     @endforeach
					</div>

                    @foreach ($posts as $key=>$post)
                    @if($key > 0 && $key < 10)
					<div class="row">
						<div class="col-md-6">
							<a href="{{ route('article.read',$post->slug) }}"><img src="{{ assset('/images/posts/'.$post->image) }}" width="100%" style="margin-bottom:15px;" /></a>
							<p align="justify">{!! substr($post->description,0,100) !!}</p>Read more <a href="{{ route('article.read',$post->slug) }}"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></a>
						</div>
                        @endif
                        @foreach
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
