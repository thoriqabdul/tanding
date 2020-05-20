@extends('admin.layouts.base')

@section('content')
        <!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Product <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Menejemen Product</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="#" href="">Edit product</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Your Block -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">
                Edit Team
            </h3>
            <div class="block-options">
                
            </div>
        </div>
        <div class="block-content block-content-full">
            {!! Form::open(['route' => ['team.update', $model->id], 'method' => 'put','autocomplete'=>"false","enctype"=>'multipart/form-data']) !!}
                @include('admin.team._form')
            {!! Form::close() !!}
        </div>
    </div>
    <!-- END Your Block -->
</div>
<!-- END Page Content -->
@endsection