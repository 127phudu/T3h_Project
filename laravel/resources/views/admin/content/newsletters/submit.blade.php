@extends('admin.layouts.adminlte')

@section('title')
    Thêm newsletter
@endsection

@section('content-header')
    <h1>Thêm newsletter</h1>
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
    <form  class="form-horizontal" action="{{ url('admin/newsletters') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email" class="control-label col-sm-2">Email: </label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection
