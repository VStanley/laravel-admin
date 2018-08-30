@extends('admin.layout.base')

@section('header')
<form action="{{route('pages.store')}}" method="post">

    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    <i class=" icon-files-empty2"></i>
                    <span class="text-semibold ml-10">Страницы</span>
                    <small class="display-block">Создание страницы</small>
                </h4>

            </div>

            {{ csrf_field() }}
            <div class="heading-elements">
                <button type="submit" class="btn btn-success heading-btn">
                    <i class="icon-floppy-disk position-left"></i>
                    Сохранить страницу
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
                    <h6 class="panel-title">SEO</h6>
                </div>

                <div class="panel-body">

                    @include('admin.errors')


                    <div class="form-group">
                        <label class="control-label text-semibold" for="title">Заголовок title</label>
                        <input type="text" name="title" value="{{old('title')}}" id="title"  maxlength="150" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label text-semibold" for="h1">Заголовок h1</label>
                        <input type="text" name="h1" value="{{old('h1')}}" id="h1" maxlength="150" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label text-semibold" for="description">Описание description</label>
                        <textarea rows="5" name="description" id="description" class="form-control">{{old('description')}}</textarea>
                    </div>
                </div>

            </div>

            <div class="panel panel-white border-top-success">

                <div class="panel-heading">
                    <h6 class="panel-title">Содержание страницы</h6>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <textarea name="content" id="summernote">{{old('content')}}</textarea>
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
                        <label class="control-label text-semibold" for="template">Выберите шаблон</label>
                        <select name="template" id="template" class="form-control">

                            @if (!empty($template))
                                @foreach($template as $tmp)
                                    <option value="{{$tmp}}">{{$tmp}}</option>
                                @endforeach
                            @else
                                <option value="">Шаблонов нет</option>
                            @endif

                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label text-semibold" for="owner_id">Выберите родителя</label>
                        <select name="owner_id" id="owner_id" class="form-control">
                            <option value="0">Нет родительской</option>
                            @if (!empty($pages))
                            @foreach($pages as $page)
                            <option value="{{$page->id}}">{{$page->title}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label text-semibold" for="show_menu">Показывать в меню</label>
                        <select name="show_menu" id="show_menu" class="form-control">
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

    </div>

</form>
@endsection

@section('js')
<script src="/admin/js/summernote.min.js"></script>
<script>
    $(document).ready(function() {

        $('#summernote').summernote();
    });
</script>
@endsection
