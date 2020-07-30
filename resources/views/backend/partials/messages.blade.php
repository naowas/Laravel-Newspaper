@if (Session::has('success'))

<div class="alert alert-success">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    <p style="color:white">{{ Session::get('success') }}</p>
</div>

@endif

@if (Session::has('error'))

<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    <p style="color:white">{{ Session::get('error') }}</p>
</div>

@endif
