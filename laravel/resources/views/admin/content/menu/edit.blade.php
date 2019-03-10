@extends('admin.layouts.adminlte')

@section('title')
    Sửa menu
@endsection

@section('content-header')
    <h1>Sửa menu</h1>
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
    <form  class="form-horizontal" action="{{ url('admin/menu/'.$menu->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label col-sm-2">Tên: </label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ $menu->name }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="slug" class="control-label col-sm-2">Slug: </label>
            <div class="col-sm-10">
                <input type="text" name="slug" class="form-control" id="slug" value="{{ $menu->slug }}">
            </div>
        </div>
        <div class="form-group">
            <label for="location" class="control-label col-sm-2">Location: </label>
            <div class="col-sm-10">
                <select name="location">
                    <option value="0">Không hiện</option>
                    @foreach($locations as $key_location => $location)
                        <option value="{{ $key_location }}" {{($key_location == $menu->location)? 'selected' : ''}}>{{ $location }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="form-group">
            <label for="desc" class="control-label col-sm-2">Mô tả: </label>
            <div class="col-sm-10">
                <textarea type="text" name="desc" class="form-control tinymce" id="desc"  required> {{ $menu->desc }} </textarea>
            </div>
        </div>


        <button type="submit" class="btn btn-default">Submit</button>
    </form>


@endsection
