
              <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 60px 15px; margin-top:30px;">
                @foreach ($health as $key=>$hlth)
                 @if($key==0)
                  <div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
                    <a href="{{ route('article.read',$hlth->slug) }}"><img src="{{ asset('images/posts/'.$hlth->image) }}" width="100%" style="margin-bottom:15px;" /></a>
	           		<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">MORE NEWS</span></h3>
                    <p align="justify">{!! substr($hlth->description,0,300) !!}</p> <a href="{{ route('article.read',$hlth->slug) }}">Read more &raquo;</a>
                    </div>
                    @endif
                    @endforeach
                     @foreach ($business as $key=>$bus)
	                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
		            	<div class="col-md-4">
	                    	<div class="row">
	    	           		<a href="{{ route('article.read',$bus->slug) }}"><img src="{{ asset('images/posts/'.$bus->image) }}" width="100%" style="margin-left:-15px;" /></a>
	        	        	</div>
	                    </div>
	            	    <div class="col-md-8">
	                    	<div class="row" style="padding-left:0px;">
	                		<h4><a href="{{ route('article.read',$bus->slug) }}">{{ $bus->title }}</a></h4>
	                		</div>
	                    </div>
                    </div>
                    @endforeach

	          </div>
