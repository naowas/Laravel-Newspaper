@extends('frontend.master')
@section('content')

	<div class="wrapper">
        @if($featured->count()>0)
		<div class="row">
            @foreach ($featured as $key=>$feature)
            @if($key == 0)
			<div class="col-md-6">
                <div class="relative">
                    <a href="{{ route('article.read',$feature->slug) }}"><img src="{{ asset('images/posts/'.$feature->image) }}" width="100%" />
	                <span class="caption">{{ $feature->title }}</span></a>
                </div>

            </div>
             @endif
             @endforeach
	    	<div class="col-md-6">
	    		<div class="row">
                @foreach ($featured as $key=>$feature)
                @if($key > 0 && $key < 3)
	        		<div class="col-md-6">
	        	<div class="relative">
                    <a href="{{ route('article.read',$feature->slug) }}"><img src="{{ asset('images/posts/'.$feature->image) }}" width="100%" />
	                <span class="caption">{{ $feature->title }}</span></a>
                </div>
	        	    </div>
                     @endif
                    @endforeach
	        	</div>
                <div class="row" style="margin-top:30px;">
                 @foreach ($featured as $key=>$feature)
                 @if($key > 3 && $key < 6)
	        		<div class="col-md-6">
	        	<div class="relative">
                    <a href="{{ route('article.read',$feature->slug) }}"><img src="{{ asset('images/posts/'.$feature->image) }}" width="100%" />
	                <span class="caption">{{ $feature->title }}</span></a>
                </div>
	        	    </div>
                     @endif
                    @endforeach
	        	</div>
	    	</div>
		</div>
        @endif
	    <div class="row" style="margin-top:30px;">
	    	<div class="col-md-8">
	        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px;">
	        	<div class="col-md-12">
	        		<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">NEWS</span></h3>
	        	</div>
	        	<div class="col-md-6">
                    @foreach ($generel as $key=>$gnrl)
                    @if($key==0)
                    <a href="{{ route('article.read',$gnrl->slug) }}"><img src="{{ asset('images/posts/'.$gnrl->image) }}" width="100%" style="margin-bottom:15px;"/></a>
                    <h3><a href="{{ route('article.read',$gnrl->slug) }}">{{ $gnrl->title }}</a></h3>
                    <p align="justify">{!! substr($gnrl->description,0,300) !!}</p> <a href="{{ route('article.read',$gnrl->slug) }}">Read more &raquo;</a>
                    @endif
                    @endforeach
                </div>

	            <div class="col-md-6">
                    @foreach ($generel as $key=>$gnrl)
                     @if($key>0 && $key<6)
	              	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
		            	<div class="col-md-4">
	                    	<div class="row">
                                <a href="{{ route('article.read',$gnrl->slug) }}"><img src="{{ asset('images/posts/'.$gnrl->image) }}" width="100%" /></a>
	        	        	</div>
	                    </div>
	            	    <div class="col-md-8">
	                    	<div class="row">
	                			<h4><a href="{{ route('article.read',$gnrl->slug) }}">{{ $gnrl->title }}</a></h4>
	                		</div>
                        </div>
	                </div>
                     @endif
                    @endforeach
	         </div>
	        </div>

		        <div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
	    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">BUSINESS</span></h3>

                    <div class="flex">
                        @foreach ($business->take(5) as $t)
                        <div>
                            <a href="{{ route('article.read',$t->slug) }}"><img src="{{ asset('images/posts/'.$t->image) }}" /></a>
                        </div>
                        @endforeach
                    </div>
		        </div>

	        <div class="row">
	        	<div class="col-md-6">
	            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
	            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
	                <h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;"><span style="padding:6px 12px; background:#b952c8;">SPORTS</span></h3>
	            	@foreach ($sports as $key=>$sport)
                    @if($key==0)
                    <a href="{{ route('article.read',$sport->slug) }}"><img src="{{ asset('images/posts/'.$sport->image) }}" width="100%" style="margin-bottom:15px;"/></a>
                    <h3><a href="{{ route('article.read',$sport->slug) }}">{{ $sport->title }}</a></h3>
                    <p align="justify">{!! substr($sport->description,0,300) !!}</p> <a href="{{ route('article.read',$sport->slug) }}">Read more &raquo;</a>
                    @endif
                    @endforeach
	            	</div>
                    @foreach ($sports as $key=>$sport)
                    @if($key>0 && $key<5)
	                <div class="col-md-12" style="padding-bottom:10px;">
		            	<div class="col-md-4">
	                    	<div class="row fashion">
                    <a href="{{ route('article.read',$sport->slug) }}"><img src="{{ asset('images/posts/'.$sport->image) }}" width="100%"/></a>
	        	        	</div>
	                    </div>
	            	    <div class="col-md-8">
	                    	<div class="row">
	                			<h4><a href="{{ route('article.read',$sport->slug) }}">{{ $sport->title }}</a></h4>
	                		</div>
	                    </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
	        	<div class="col-md-6">
	            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
	            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
	                <h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;"><span style="padding:6px 12px; background:#d95757;">TECHNOLOGY</span></h3>
	            	@foreach ($technology as $key=>$techno)
                    @if($key==0)
                    <a href="{{ route('article.read',$techno->slug) }}"><img src="{{ asset('images/posts/'.$techno->image) }}" width="100%" style="margin-bottom:15px;"/></a>
                    <h3><a href="{{ route('article.read',$techno->slug) }}">{{ $techno->title }}</a></h3>
                    <p align="justify">{!! substr($techno->description,0,300) !!}</p> <a href="{{ route('article.read',$techno->slug) }}">Read more &raquo;</a>
                    @endif
                    @endforeach
                    </div>
                    @foreach ($technology as $key=>$techno)
                    @if($key>0 && $key<5)
	                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
		            	<div class="col-md-4">
	                    	<div class="row fashion">
                    <a href="{{ route('article.read',$techno->slug) }}"><img src="{{ asset('images/posts/'.$techno->image) }}" width="100%"/></a>
	        	        	</div>
	                    </div>
	            	    <div class="col-md-8">
	                    	<div class="row" style="padding-left:0px;">
	                			<h4><a href="{{ route('article.read',$techno->slug) }}">{{ $techno->title }}</a></h4>
	                		</div>
                        </div>

                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

	        <div class="col-md-12">
	        	<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
				<div class="col-md-12">
	            <h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">HEALTH</span></h3>
	            </div>
	        	<div class="col-md-6">
	            	@foreach ($health as $key=>$hlth)
                    @if($key==0)
                    <a href="{{ route('article.read',$hlth->slug) }}"><img src="{{ asset('images/posts/'.$hlth->image) }}" width="100%" style="margin-bottom:15px;"/></a>
                    <h3><a href="{{ route('article.read',$hlth->slug) }}">{{ $hlth->title }}</a></h3>
                    <p align="justify">{!! substr($hlth->description,0,300) !!}</p> <a href="{{ route('article.read',$hlth->slug) }}">Read more &raquo;</a>
                    @endif
                    @endforeach
	            </div>
	            <div class="col-md-6">
	            @foreach ($health as $key=>$hlth)
                     @if($key>0 && $key<6)
	              	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
		            	<div class="col-md-4">
	                    	<div class="row">
                                <a href="{{ route('article.read',$hlth->slug) }}"><img src="{{ asset('images/posts/'.$hlth->image) }}" width="100%" /></a>
	        	        	</div>
	                    </div>
	            	    <div class="col-md-8">
	                    	<div class="row">
	                			<h4><a href="{{ route('article.read',$hlth->slug) }}">{{ $hlth->title }}</a></h4>
	                		</div>
                        </div>
	                </div>
                     @endif
                    @endforeach
	            </div>
	        </div>
			</div>

<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
	    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">TRAVEL</span></h3>

                    <div class="flex">
                        @foreach ($travel->take(5) as $busns)
                        <div>
                            <a href="{{ route('article.read',$busns->slug) }}"><img src="{{ asset('images/posts/'.$busns->image) }}" /></a>
                        </div>
                        @endforeach
                    </div>
		        </div>

	       <div class="col-md-12">
	        	<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
				<div class="col-md-12">
	            <h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">HEALTH</span></h3>
	            </div>
	        	<div class="col-md-6">
	            	@foreach ($health as $key=>$hlth)
                    @if($key==0)
                    <a href="{{ route('article.read',$hlth->slug) }}"><img src="{{ asset('images/posts/'.$hlth->image) }}" width="100%" style="margin-bottom:15px;"/></a>
                    <h3><a href="{{ route('article.read',$hlth->slug) }}">{{ $hlth->title }}</a></h3>
                    <p align="justify">{!! substr($hlth->description,0,300) !!}</p> <a href="{{ route('article.read',$hlth->slug) }}">Read more &raquo;</a>
                    @endif
                    @endforeach
	            </div>
	            <div class="col-md-6">
	            @foreach ($health as $key=>$hlth)
                     @if($key>0 && $key<6)
	              	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
		            	<div class="col-md-4">
	                    	<div class="row">
                                <a href="{{ route('article.read',$hlth->slug) }}"><img src="{{ asset('images/posts/'.$hlth->image) }}" width="100%" /></a>
	        	        	</div>
	                    </div>
	            	    <div class="col-md-8">
	                    	<div class="row">
	                			<h4><a href="{{ route('article.read',$hlth->slug) }}">{{ $hlth->title }}</a></h4>
	                		</div>
                        </div>
	                </div>
                     @endif
                    @endforeach
	            </div>
	        </div>
	        </div>
            </div>
        </div>

	        <div class="col-md-4">
	        <div class="col-md-12" style="border:1px solid #ccc; padding:15px;">
				<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">STYLE</span></h3>
                  @foreach ($style->take(7) as $key=>$styl)
                     @if($style->count() > 0)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
		           	<div class="col-md-4">
	                   	<div class="row">
	    	           		<a href="{{ route('article.read',$styl->slug) }}"><img src="{{ asset('images/posts/'.$styl->image) }}" width="100%" style="margin-left:-15px;" /></a>
	        	       	</div>
	                </div>
	            	<div class="col-md-8">
	                   	<div class="row" style="padding-left:10px;">
	                		<h4><a href="{{ route('article.read',$styl->slug) }}">{{ $styl->title }}</a></h4>
	                	</div>
                    </div>
                </div>
                @endif
                @endforeach

	          </div>
        @include('frontend.more_news')
	        </div>
	    </div>
	</div>
@endsection
