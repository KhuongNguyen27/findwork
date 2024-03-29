@extends('admintheme::layouts.master')
@section('content')
@include('admintheme::includes.globals.breadcrumb',[
'page_title' => __('profile_list'),
'actions' => [
'add_new' => route($route_prefix.'create' ),
//'export' => route($route_prefix.'export'),
]
])
<!-- Item actions -->
<form action="{{ route($route_prefix.'index') }}" method="get">
    <div class="row">
        <div class="col">
            <input class="form-control" name="name" type="text" placeholder="Tên CV mẫu"
                value="{{ request()->name ?? ''  }}">
        </div>
        <div class="col">
            <select name="career" class="form-select">
                <option value="">Lựa chọn ngành nghề</option>
                @foreach ($careers as $career)
                <option value="{{ $career->slug }}" {{ request()->career == $career->slug? 'selected' : ''}}>
                    {{ $career->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select name="style" class="form-select">
                <option value="">Lựa chọn thiết kế</option>
                @foreach ($styles as $style)
                <option value="{{ $style->slug }}" {{ request()->style == $style->slug? 'selected' : ''}}>
                    {{ $style->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select name="language" class="form-control">
                <option value="">Ngôn ngữ sử dụng</option>
                <option value="1" {{ request()->language == '1' ? 'selected' : '' }}>Tiếng Việt </option>
                <option value="2" {{ request()->language == '2' ? 'selected' : '' }}>Tiếng Nhật </option>
                <option value="3" {{ request()->language == '3' ? 'selected' : '' }}>Tiếng Anh </option>
            </select>
        </div>
        <div class="col">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                <button class="btn btn-light px-4"><i class="bi bi-box-arrow-right me-2"></i>{{ __('search') }}</button>
            </div>
        </div>
    </div>
</form>
<div class="card mt-4">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <div class="card-body">
        <div class="product-table">
            <div class="table-responsive white-space-nowrap">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('id') }}</th>
                            <th>{{ __('name') }}</th>
                            <th>{{ __('language') }}</th>
                            <th>{{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( count( $items ) )
                        @foreach( $items as $item )
                        <tr>
                            <td>#{{ $item->id }}</td>
                            <td>
                                {{ $item->name ?? '' }}
                            </td>
                            <td>{{ $item->language  == $item::VIETNAMESE ? 'Tiếng Việt' : ($item->language  == $item::JAPANESE ? 'Tiếng Nhật' : 'Tiếng Anh') }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border dropdown-toggle dropdown-toggle-nocaret"
                                        type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <!-- <li>
                                            <a class="dropdown-item" href="{{-- route($route_prefix.'show',$item->id) --}}">
                                                {{-- __('show') --}}
                                            </a>
                                        </li> -->
                                        <li>
                                            <a class="dropdown-item" href="{{ route($route_prefix.'edit',$item->id) }}">
                                                {{ __('edit') }}
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route($route_prefix.'destroy',$item->id) }}" method="get">
                                                @csrf
                                                <button onclick=" return confirm('{{ __('sys.confirm_delete') }}') "
                                                    class="dropdown-item">
                                                    {{ __('delete') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">{{ __('no_item_found') }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if( count( $items ) )
    <div class="card-footer pb-0">
        @include('admintheme::includes.globals.pagination')
    </div>
    @endif
</div>
@endsection