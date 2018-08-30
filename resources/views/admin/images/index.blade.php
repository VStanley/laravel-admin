@extends('admin.layout.base')

@section('content')
    <div class="row">

        <div class="col-md-9">

        </div>

        <div class="col-md-3">

        </div>

    </div>
@endsection

@section('header')
    <div class="page-header page-header-default">
        <div class="page-header-content">

            <div class="page-title">
                <h4>
                    <i class="icon-images2"></i>
                    <span class="text-semibold ml-10">Изображения</span>
                    <small class="display-block">Все изображения сайта</small>
                </h4>
            </div>

            <div class="heading-elements">
                <a href="{{ route('images.create') }}" type="button" class="btn btn-success heading-btn">
                    <i class="icon-plus3 position-left"></i>
                    Добавить изображения
                </a>
            </div>

        </div>
    </div>
@endsection


@section('js')

@endsection