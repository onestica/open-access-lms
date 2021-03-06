@extends('layouts.master')
@section('title')
    {{ __('section-title.user_edit') }}
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Edit</strong> User Data</h2>
            </div>
            <div class="body">
                <form method="POST" action="{{ \LaravelLocalization::localizeURL('admin/users/'.$user->id) }}">
                    @csrf
                    @method('patch')
                    <div class="row clearfix">
                        @include('admin.user.form')
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">{{ __('button-label.update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
