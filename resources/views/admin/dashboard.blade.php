@extends('admin.layout.base')


@section('content')
<div class="row">

    <div class="panel panel-flat border-top-success">
        <div class="panel-heading">
            <h6 class="panel-title">Панельки с инфой</h6>
        </div>

        <div class="panel-body">
            тут инфа будет
        </div>
    </div>

</div>
@endsection

@section('header')

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <i class="icon-home"></i>
                <span class="text-semibold ml-10">Информация</span>
                <small class="display-block">Консоль управления сайтом</small>
            </h4>

        </div>

    </div>

</div>

@endsection

@section('js')
<script src="/admin/js/app.min.js"></script>
@endsection