@extends('layouts.app')

@section('content')
<div class="container-fluid">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('status'))
<div class="alert alert-success">
  {{ Session::get('status')}}
</div>
@endif
    <div class="card">
        <div class="card-header">
            <h2 class="font-weight-light">Create Company</h2>  
        </div>
        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="card-body">
            <div class="m-3">
                    <img id="createCompanyLogo" width='250'src="#" height='250' class='rounded mx-auto d-block' alt="Upload Logo"/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="logo">Company Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo"  onchange="readImage(this);" accept="image/x-png, image/png, image/jpg, image/jpeg">
                </div>
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Company Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="email">Website</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-primary" href="{{ route('company.index') }}">Cancel</a>
                </div>
       </form>
    </div>    
</div>
@endsection
@section('script')
<script>
        function readImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#createCompanyLogo')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection
