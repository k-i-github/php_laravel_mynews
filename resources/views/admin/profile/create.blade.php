@extends('layouts.profile')


@section('title', 'My プロフィール')


@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" 
                      method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名(name)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="radio1a" value="{{ old('title') }}">
                                  <label class="form-check-label" for="radio1a">男性</label>
                            </div>
                            <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="radio1b" value="{{ old('title') }}">
                                  <label class="form-check-label" for="radio1b">女性</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="5">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection