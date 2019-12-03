


@extends('layouts.user')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-12 mt40">
            <div class="card-header" style="background: #0275D8;">
                <h2>Register for Event</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Opps!</strong> Something went wrong<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pay') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

         <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Mobile Number</strong>
                    <input type="text" name="mobilenumber" class="form-control" placeholder="Enter Mobile Number">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email Id</strong>
                    <input type="text" name="emailid" class="form-control" placeholder="Enter Email id">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Event Fees</strong>
                    <input type="text" name="fee" class="form-control" placeholder="Amount">
                </div>
            </div>
            <div class="col-md-12">
                    <input class="btn btn-success" type="Submit" value="add">
            </div>
        </div>

    </form>
@endsection
