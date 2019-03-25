@extends('admin.layouts.adminlte')

@section('title')
    Sửa thông tin khách hàng
@endsection

@section('content-header')
    <h1>Sửa thông tin khách hàng</h1>
@endsection

@section('content')

    <form  class="form-horizontal" action="{{ url('admin/shop/customer/'.$customer->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label col-sm-2">Tên: </label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ $customer->name }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="control-label col-sm-2">Email: </label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email" value="{{ $customer->email }}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection
