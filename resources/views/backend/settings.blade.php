@extends('backend.partials.master')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Settings</h1>
		</div>

		<div class="col-sm-6 cat-form">
			@include('backend.partials.messages')

			<h3>Website Settings</h3>
			<form action="{{route('admin.settings.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Logo</label>
					<input type="file" name="image" id="logo" class="form-control">
					<p>Website Logo.</p>
				</div>
                <div id="socialFieldGroup">
				<div class="form-group">
					<label>Social Links</label>
					<input type="url" name="url[]" id="url" class="form-control">
					<p>E.g https://something.com</p>
                </div>
                 </div>
                <div class="text-right">
                    <span class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i></span>
                </div>

				<div class="form-group">
					<label>About US</label>
					<textarea name="about" id="about" class="form-control" rows="5"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Add Settings</button>
				</div>
			</form>
		</div>


	</div>
</div>
<script>
        $('#addSocialField').click(function(){
            newDiv = $(document.createElement('div')).attr("class","form-group");
            newDiv.after().html('<input type="url" name="url[]" class="form-control"></div>');
            newDiv.appendTo("#socialFieldGroup");
        })

</script>

@endsection
