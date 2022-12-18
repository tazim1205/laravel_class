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
</style>
<body>
    
    <div class="container">
        <div class="form-body">
            <div class="form-title">
                <h2>Student Information</h2>
            </div>
            <div class="form-b">
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
                <form action="{{url('registration_store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Name</label>
                                <input type="text" class="form-control" name="student_name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Fathers Name</label>
                                <input type="text" class="form-control" name="fathers_name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Mothers Name</label>
                                <input type="text" class="form-control" name="mothers_name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Address</label>
                                <textarea class="form-control" name="address"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Fees</label>
                                <input type="text" class="form-control" name="fees">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-single-box">
                                <label>Status</label>
                                <select class="form-select" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
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