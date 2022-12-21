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
    .badge-success{
        background : green;
        color:white;
    }
    .badge-danger{
        background : red;
        color:white;
    }
</style>
<body>
    
    <div class="container">
        <div class="form-body">
            <div class="form-title row">
                <div class="col-6">

                    <h2>View Student Data</h2>
                </div>
                <div class="col-6">
                    <a href="{{url('/registration_form')}}" class="btn btn-info">Add Data</a>
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
                <div class="data">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Mother Name</th>
                                <th>Adress</th>
                                <th>Fees</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data)
                            @foreach($data as $v)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$v->student_name}}</td>
                                <td>{{$v->fathers_name}}</td>
                                <td>{{$v->mothers_name}}</td>
                                <td>{!! $v->address !!}</td>
                                <td>{{$v->fees}}</td>
                                <td>
                                    @if($v->status == 1)
                                    <div class="badge badge-success">
                                        active
                                    </div>
                                    @else
                                    <div class="badge badge-danger">
                                        inactive
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/edit_data')}}/{{$v->id}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('/delete_data')}}/{{$v->id}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
"></script>
</body>
</html>