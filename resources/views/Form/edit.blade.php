<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Registration Form</title>
</head>
<style>
    .is-invalid{
        border:1px solid red;
    }
</style>
<body>

    <div class="container">
        <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->


            @if(Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{Session::get('success')}}</strong>
            </div>
            @elseif(Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{Session::get('error')}}</strong>
            </div>
            @elseif(Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{Session::get('info')}}</strong>
            </div>
            @endif
        <form action="{{url('form_update')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
            <h2 class="text-center">Student Form</h2>
                <a href="{{url('/view_form')}}" class="btn btn-info">View Data</a>
            @csrf
            <div class="row jumbotron">
                <div class="col-sm-6 form-group">
                    <label>Name</label>
                    <input type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ $data->student_name }}">
                    @error('student_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6 form-group">
                    <label>Fathers Name</label>
                    <input type="text" class="form-control @error('fathers_name') is-invalid @enderror" name="fathers_name" value="{{ $data->fathers_name }}">
                    @error('fathers_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6 form-group">
                    <label>Mothers Name</label>
                    <input type="text" class="form-control @error('mothers_name') is-invalid @enderror" name="mothers_name" value="{{ $data->mothers_name }}">
                    @error('mothers_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6 form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address">{!! $data->address !!}</textarea>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Fees</label>
                    <input type="text" class="form-control @error('fees') is-invalid @enderror" name="fees" value="{{ $data->fees }}">
                    @error('fees')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6 form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="">Select One</option>
                        <option @if($data->status == 1) selected @endif value="1">Active</option>
                        <option @if($data->status == 0) selected @endif value="0">Inactive</option>
                    </select>
                    @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-sm-6 form-group">
                    <label>Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <img src="{{asset('/Frontend/formimage')}}/{{$data->image}}" alt="" height="80px" width="80px">
                </div>
                
                <div class="col-lg-6">
                    <div class="input-single-box">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>