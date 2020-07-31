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
            @if($settings->count() < 1 )

                <h1> if working, row count = {{ $settings->count() }}</h1>
                <form action="{{ route('admin.settings.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Logo</label>
                        <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
                                style="display: none;"></p>
                        <p><label for="file" class="btn btn-warning" style="cursor: pointer;">Upload Image</label></p>
                        <p><img id="output" width="200" /></p>

                        <p>Website Logo.</p>
                    </div>
                    <div id="socialFieldGroup">

                        <div class="form-group">
                            <label>Social Links</label>
                            <input type="text" name="url[]" id="url" class="form-control">
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
            @else
                {{-- <h1>Else working, row count = {{$settings->count() }}</h1> --}}
                @foreach($settings as $setting)
                    <form action="{{ route('admin.settings.update',$setting->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Logo</label>
                            <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
                                    style="display: none;"></p>
                            <p><label for="file" class="btn btn-warning" style="cursor: pointer;">Upload Image</label>
                            </p>
                            <p><img id="output" width="200" /></p>

                            <img src="{!! asset('images/settings/'.$setting->image) !!}" width="100">

                            <p>Website Logo.</p>
                        </div>
                        <div id="socialFieldGroup">

                            <div class="form-group">
                                @foreach($a as $b)


                                    <label>Social Links</label>
                                    <input type="text" name="url[]" id="url" class="form-control" value="{{ $b }}">
                                    <p>E.g https://something.com</p>
                                @endforeach
                            </div>
                        </div>

                        <div class="text-right">
                            <span class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="form-group">
                            <label>About US</label>
                            <textarea name="about" id="about" class="form-control"
                                rows="5"> {{ $setting->about }}  </textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Update Settings</button>
                        </div>
                    </form>
                @endforeach

            @endif
        </div>
    </div>
</div>
<script>
    $('#addSocialField').click(function () {
        newDiv = $(document.createElement('div')).attr("class", "form-group");
        newDiv.after().html('<input type="text" name="url[]" class="form-control"></div>');
        newDiv.appendTo("#socialFieldGroup");
    })

</script>

<script>
    var loadFile = function (event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>

@endsection
