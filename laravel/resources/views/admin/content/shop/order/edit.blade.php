@extends('admin.layouts.adminlte')

@section('title')
    Sửa đơn hàng
@endsection

@section('content-header')
    <h1>Sửa đơn hàng</h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form  class="form-horizontal" action="{{ url('admin/shop/order/'.$order->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="customer_name" class="control-label col-sm-2">Tên khách hàng: </label>
            <div class="col-sm-10">
                <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{ $order->customer_name }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="customer_email" class="control-label col-sm-2">Email: </label>
            <div class="col-sm-10">
                <input type="text" name="customer_email" class="form-control" id="customer_email" value="{{ $order->customer_email }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="customer_phone" class="control-label col-sm-2">Số điện thoại: </label>
            <div class="col-sm-10">
                <input type="text" name="customer_phone" class="form-control" id="customer_phone" value="{{ $order->customer_phone }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="customer_address" class="control-label col-sm-2">Địa chỉ: </label>
            <div class="col-sm-10">
                <input type="text" name="customer_address" class="form-control" id="customer_address" value="{{ $order->customer_address }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="customer_city" class="control-label col-sm-2">Thành phố: </label>
            <div class="col-sm-10">
                <input type="text" name="customer_city" class="form-control" id="customer_city" value="{{ $order->customer_city }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="customer_country" class="control-label col-sm-2">Quốc gia: </label>
            <div class="col-sm-10">
                <input type="text" name="customer_country" class="form-control" id="customer_country" value="{{ $order->customer_country }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="customer_country" class="control-label col-sm-2">Trạng thái: </label>
            <div class="col-sm-10">
                <select name="status">
                    <option value="1" {{ ($order->status == 1) ? 'selected' : ''}}>Chưa hoàn thiện</option>
                    <option value="2" {{ ($order->status == 2) ? 'selected' : ''}}>Đã hoàn thiện</option>
                    <option value="3" {{ ($order->status == 3) ? 'selected' : ''}}>Đang vận chuyển</option>
                    <option value="4" {{ ($order->status == 4) ? 'selected' : ''}}>Đã giao hàng</option>
                    <option value="5" {{ ($order->status == 5) ? 'selected' : ''}}>Hủy đơn</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="customer_note" class="control-label col-sm-2">Ghi chú: </label>
            <div class="col-sm-10">
                <input type="text" name="customer_note" class="form-control" id="customer_note" value="{{ $order->customer_note }}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    

@endsection
