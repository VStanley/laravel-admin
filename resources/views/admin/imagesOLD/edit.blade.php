@extends('admin.layout.base')

@section('header')
    <form action="{{route('images.update', $image->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">

        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4>
                        <i class="icon-image2"></i>
                        <span class="text-semibold ml-10">Изображение</span>
                        <small class="display-block">Редактирование</small>
                    </h4>

                </div>

                {{ csrf_field() }}
                <div class="heading-elements">
                    <button type="submit" class="btn btn-success heading-btn">
                        <i class="icon-floppy-disk position-left"></i>
                        Обновить изображение
                    </button>
                </div>

            </div>

        </div>
        @endsection

        @section('content')

            <div class="row">

                <div class="col-md-9">
                    <div class="panel panel-white border-top-success">
                        <div class="panel-heading">
                            <h6 class="panel-title">Изображение</h6>
                        </div>
                        <div class="panel-body">

                            @include('admin.errors')



                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-white border-top-success">
                        <div class="panel-heading">
                            <h6 class="panel-title">Настройки</h6>
                        </div>
                        <div class="panel-body">



                        </div>
                    </div>
                </div>

            </div>

    </form>
@endsection

@section('js')
    <script src="/admin/js/app.min.js"></script>

@endsection
