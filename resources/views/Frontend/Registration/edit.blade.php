<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<style>
    .input-single-box{
        margin-top:20px;
    }
    .is-invalid{
        border : 1px solid red;
    }
</style>
<body>
    
    <div class="container">
        <div class="form-body">
            <div class="form-title row">
                <div class="col-6">

                    <h2>Student Information</h2>
                </div>
                <div class="col-6">
                    <a href="{{url('/view_data')}}" class="btn btn-info">View Data</a>
                </div>
            </div>
            <div class="form-b">

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
                <form action="{{url('registration_update')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Name</label>
                                <input type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ $data->student_name }}">
                                @error('student_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Fathers Name</label>
                                <input type="text" class="form-control" name="fathers_name" value="{{ $data->fathers_name }}">
                                @error('fathers_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Mothers Name</label>
                                <input type="text" class="form-control" name="mothers_name" value="{{ $data->mothers_name }}">
                                @error('mothers_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Address</label>
                                <textarea class="form-control" name="address">{!! $data->address !!}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Fees</label>
                                <input type="text" class="form-control" name="fees" value="{{ $data->fees }}">
                                @error('fees')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Status</label>
                                <select class="form-select" name="status">
                                    <option value=" ">Select One</option>
                                    <option @if($data->status == 1) selected @endif  value="1">Active</option>
                                    <option @if($data->status == 0) selected @endif  value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Fees</label>
                                <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <img src="{{asset('/Frontend/studentImage')}}/{{$data->image}}" alt="" height="80px" width="80px">
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
"></script>
</body>
</html>