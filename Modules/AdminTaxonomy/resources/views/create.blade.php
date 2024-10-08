@extends('admintheme::layouts.master')
@section('content')
    @include('admintheme::includes.globals.breadcrumb',[
        'page_title' => 'Thêm phân loại'
    ])
    <form action="{{ route('admintaxonomy.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="{{ request()->type }}">
        <div class="row">
            <div class="col-12 col-lg-8">
                @include('admintaxonomy::includes.form-left')
            </div>
            <div class="col-12 col-lg-4">
                @include('admintaxonomy::includes.form-right')
            </div>
        </div>
    </form>
@endsection