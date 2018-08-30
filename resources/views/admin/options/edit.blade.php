@extends('admin.layout.base')

@section('header')
    <form action="{{route('options.update', $parameter->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">

        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4>
                        <i class="icon-grid5"></i>
                        <span class="text-semibold ml-10">Параметр</span>
                        <small class="display-block">Создание параметра</small>
                    </h4>

                </div>

                {{ csrf_field() }}
                <div class="heading-elements">
                    <button type="submit" class="btn btn-success heading-btn">
                        <i class="icon-floppy-disk position-left"></i>
                        Обновить параметр
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
                            <h6 class="panel-title">Параметр</h6>
                        </div>
                        <div class="panel-body">

                            @include('admin.errors')

                            <div class="form-group">
                                <label class="control-label text-semibold" for="name">Название параметра</label>
                                <input type="text" name="name" value="{{$parameter->name}}" id="name" maxlength="150"
                                       class="form-control">
                            </div>

                            <div class="form-group options-value">
                                <label class="control-label text-semibold" for="summernote">Значение</label>
                                <textarea rows="5" name="value" id="summernote" class="form-control">{{$parameter->value}}</textarea>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-white border-top-success">
                        <div class="panel-heading">
                            <h6 class="panel-title">Настройки</h6>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <div class="checkbox checkbox-switchery switchery-xs">
                                    <label>
                                        <input type="checkbox" class="switchery">
                                        Расширеный редактор
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label text-semibold" for="page_id">Выберите страницу</label>
                                <select name="page_id" id="page_id" class="form-control">
                                    <option value="0">Отображать везде</option>
                                    @if (!empty($pages))
                                        @foreach($pages as $page)
                                            @if($page->id == $parameter->page_id)
                                                <option value="{{$page->id}}" selected>{{$page->title}}</option>
                                            @else
                                                <option value="{{$page->id}}">{{$page->title}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

    </form>
@endsection

@section('js')
    <script src="/admin/js/switchery.min.js"></script>
    <script src="/admin/js/summernote.min.js"></script>
    <script>
        $(document).ready(function () {

            function checkSwitchery() {

                if ($('.switchery').prop('checked')) {

                    $('#summernote').summernote();
                } else {

                    $('#summernote').summernote('destroy');
                }
            }

            checkSwitchery();

            $('.switchery').click(function () {

                checkSwitchery();
            });

        });
    </script>
@endsection
