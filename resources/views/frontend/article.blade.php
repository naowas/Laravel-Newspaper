@extends('frontend.master')
@section('content')

	<div class="wrapper">

		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">
					<div class="col-md-12">

						<img src="{{ asset('images/posts/'.$single_post->image) }}" width="100%" style="margin-bottom:15px;" />
						<h3 style="color: black">{{ $single_post->title }}</h3>
						<p align="justify">{!! $single_post->description !!}</p>

                    </div>
					<div class="row">
						<div class="col-md-12">
							<h3 style="color: black">You May Also Like</h3>
                        </div>
                         @if($related_post->count()>0)
                        @foreach ($related_post->take(3) as $related)
						<div class="col-md-4">
                            <a href="{{ route('article.read',$related->slug) }}"><img style="height: 200px" src="{{ asset('images/posts/'.$related->image) }}" width="100%" style="margin-bottom:15px;" /></a>
                            <a href="{{ route('article.read',$related->slug) }}""> <h4 style="color: black">{{ $related->title }}</h4>
</a>
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
