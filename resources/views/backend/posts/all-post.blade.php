@extends('backend.partials.master')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 title">
      <h1><i class="fa fa-bars"></i> All Posts <a href="{{ route('admin.post') }}" class="btn btn-sm btn-default">Add New</a></h1>
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        All ({{ $total_count }}) | <a href="#">Published({{ $published }})</a>
      </div>

      <div class="col-sm-3">
        <input type="text" id="search" class="form-control" placeholder="Search Posts">
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="filter-div">
      <form action="{{ route('admin.post.delete') }}" method="post">
        @csrf
        <div class="col-sm-2">
         <select name="bulk" class="form-control">
			<option value="0">Bulk Action</option>
			<option value="1">Move to Trash</option>
		</select>
        </div>

        <div class="col-sm-7">
          <div class="row">
            <button class="btn btn-default">Apply</button>
          </div>
        </div>

      <div class="col-sm-3 text-right">
      {{ $all_post->links() }}
      </div>
    </div>

    <div class="col-sm-12">
      <div class="content">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th width="50%"><input type="checkbox" id="select-all"> Title</th>
              <th width="15%">Category</th>
              <th width="15%">Status</th>
              <th width="10%">Date</th>
            </tr>
          </thead>
          <tbody>
            @if($all_post->count() > 0 )
             @foreach ($all_post as $post)
            <tr>
              <td>
                <input type="checkbox" name="delid[]" value="{{$post->id}}">
                <a href="{{ route('admin.post.edit',$post->id)}}">{{ $post->title }}</a>
              </td>
              <td>{{ $post->category_id }}</td>
              <td>{{ $post->status }}</td>
              <td>{{ $post->created_at }}</td>
            </tr>
             @endforeach
             @else
             <tr>
                 <td colspan="4">No post found</td>
             </tr>
             @endif
          </tbody>
        </table>
      </div>
    </div>
 </form>
    <div class="clearfix"></div>

    <div class="filter-div">



      <div class="col-sm-12 text-right">
     {{ $all_post->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
