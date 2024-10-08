@extends('admintheme::layouts.master')
@section('content')
@include('admintheme::includes.globals.breadcrumb',[
    'page_title' => 'Danh sách bài viết',
    'actions' => [
        'add_new' => route($route_prefix.'create',['type'=>request()->type]),
        //'export' => route($route_prefix.'export'),
    ]
])
<form action="{{ route('adminpost.update',$item->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="type" value="{{ request()->type }}">
    <div class="row">
        <div class="col-12 col-lg-8">
            @include('adminpost::includes.form-left')
        </div>
        <div class="col-12 col-lg-4">
            @include('adminpost::includes.form-right')
        </div>
    </div>
</form>
<!--end row-->
@endsection