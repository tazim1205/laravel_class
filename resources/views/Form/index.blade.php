

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
            <h2 class="text-center">Student Form</h2>
                <a href="{{url('/std_form')}}" class="btn btn-info">Add Data</a>
            @csrf
            <div class="data">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Mother Name</th>
                                <th>Address</th>
                                <th>Fees</th>
                                <th>Status</th>
                                <th>Image</th>
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
                                <div class="badge badge-active">Active</div>
                                @else
                                <div class="badge badge-danger">Inactive</div>
                                @endif
                            </td>
                            <td>
                                <img src="{{asset('/Frontend/formimage')}}/{{$v->image}}" alt="" height="80px" width="80px">
                                
                                <!-- <iframe src="{{asset('/Frontend/studentImage')}}/{{$v->image}}" height="200" width="300"></iframe> -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


