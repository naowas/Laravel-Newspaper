@extends('backend.partials.master')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Categories</h1>
		</div>

		<div class="col-sm-4 cat-form">
			@include('backend.partials.messages')

			<h3>Add New Category</h3>
			<form action="{{route('admin.category.store')}}" method="POST">
				@csrf
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="category_name" id="category_name" class="form-control">
					<p>The name is how it appears on your site.</p>
				</div>

				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" id="slug" class="form-control" readonly="">
					<p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
				</div>

				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
						<option>ON</option>
						<option>OFF</option>
					</select>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" rows="5"></textarea>
					<p>The description is not important and will not be displayed.</p>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Add New Category</button>
				</div>
			</form>
		</div>

<form class="" action="{{route('admin.category.delete')}}" method="post">
	@csrf
		<div class="col-sm-8 cat-view">
			<div class="row">
				<div class="col-sm-3">
					<select name="bulk" class="form-control">
						<option value="0">Bulk Action</option>
						<option value="1">Move to Trash</option>
					</select>
				</div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-default">Delete</button>
				</div>
				<div class="col-sm-3 col-sm-offset-4">
					<input type="text" id="search" name="search" class="form-control" placeholder="Search Category">
				</div>
			</div>
			<div class="content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th><input type="checkbox" id="select-all"> Name</th>
							<th>Description</th>
							<th>Slug</th>
							<th>Status</th>
							<th>Count</th>
						</tr>
					</thead>
					<tbody>

@foreach ($categories as $category)
						<tr>
							<td>
								<input type="checkbox" name="delid[]" value="{{$category->id}}">
								<a href="{{ route('admin.category.edit', $category->id) }}">{{$category->category_name}}</a>
							</td>
							<td>{{$category->description}}</td>
							<td>{{$category->slug}}</td>
							<td>{{$category->status}}</td>
							<td>0</td>
						</tr>
@endforeach
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-sm-12">
			        <ul class="pagination">
			          <li><a href="#">&laquo;</a></li>
			          <li><a href="#">1</a></li>
			          <li><a href="#">2</a></li>
			          <li class="active"><a href="#">3</a></li>
			          <li><a href="#">4</a></li>
			          <li><a href="#">5</a></li>
			          <li><a href="#">&raquo;</a></li>
			        </ul>
			    </div>
			</div>
		</div>
		</form>
	</div>
</div>

@endsection
