@extends('admin.layout.base')

@section('header')
<form action="{{route('pages.update', $page->id)}}" method="post">
    <input name="_method" type="hidden" value="PUT">

    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    <i class=" icon-files-empty2"></i>
                    <span class="text-semibold ml-10">Страницы</span>
                    <small class="display-block">Редактирование страницы</small>
                </h4>

            </div>

            {{ csrf_field() }}
            <div class="heading-elements">
                <button type="submit" class="btn btn-success heading-btn">
                    <i class="icon-floppy-disk position-left"></i>
                    Обновить страницу
                </button>
            </div>

        </div>

    </div>
    @endsection

    @section('content')

    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-white">

                <div class="panel-heading">
                    <h6 class="panel-title">SEO</h6>
                </div>

                <div class="panel-body">

                    @include('admin.errors')


                    <div class="form-group">
                        <label class="control-label text-semibold">Заголовок title</label>
                        <input type="text" name="title" value="{{$page->title or ''}}" maxlength="150" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label text-semibold">Заголовок h1</label>
                        <input type="text" name="h1" value="{{$page->h1 or ''}}" maxlength="150" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label text-semibold">Описание description</label>
                        <textarea rows="5" name="description" class="form-control">{{$page->description or ''}}</textarea>
                    </div>
                </div>

            </div>

            <div class="panel panel-white">

                <div class="panel-heading">
                    <h6 class="panel-title">Содержание страницы</h6>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <textarea name="content" id="summernote">{{$page->content or ''}}</textarea>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-md-3">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">Настройки</h6>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="control-label text-semibold">Выберите шаблон</label>
                        <select name="template" class="form-control">

                            @if (!empty($template))
                            @foreach($template as $tmp)
                            <option value="{{$tmp}}"
                                @if ($tmp== $page->template)
                                selected="selected"
                                @endif
                            >
                                {{$tmp}}
                            </option>
                            @endforeach
                            @else
                            <option value="">Шаблонов нет</option>
                            @endif

                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label text-semibold">Выберите родителя</label>
                        <select name="owner_id" class="form-control">
                            <option value="0">Нет родительской</option>
                            @if (!empty($pages))
                            @foreach($pages as $pageUno)
                                @if($pageUno->id == $page->id)
                                    @continue
                                    @else
                                    <option value="{{$pageUno->id}}"
                                        @if ($pageUno->id == $page->owner_id)
                                        selected="selected"
                                        @endif
                                    >
                                        {{$pageUno->title}}
                                    </option>
                                    @endif
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label text-semibold">Показывать в меню</label>
                        <select name="show_menu" class="form-control">

                            @if ($page->show_menu == 1)
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                            @else
                            <option value="1">Да</option>
                            <option value="0" selected="selected">Нет</option>
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
<script src="/admin/js/summernote.min.js"></script>
<script>
    $(document).ready(function() {

        $('#summernote').summernote();
    });
</script>
@endsection
