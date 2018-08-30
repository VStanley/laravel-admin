@extends('admin.layout.base')

@section('content')
    <div class="row">

        <div class="col-md-9">

        </div>

        <div class="col-md-3">
            <div class="panel panel-white border-top-success">

                <div class="panel-body">

                    <div class="content-group">
                        <h6 class="text-semibold heading-divided">
                            <i class="icon-folder6 position-left"></i> Категории изображений
                        </h6>
                        <form action="{{route('images.addCategory')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="hidden" name="owner_id" value="0">
                                    <input type="text" name="category" class="form-control addCategory"
                                           placeholder="Добавить категорию">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit" id="addCategory">
                                            Добавить
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>

                        <div class="tree-default">

                            @if (count($categoriesImages) > 0)
                                <ul>
                                    @foreach ($categoriesImages as $categoryImage)
                                        @include('admin.images.layout.three', $categoryImage)
                                    @endforeach
                                </ul>
                            @else
                                <ul>
                                    <li class="lead" style="list-style: none">Добавьте категории</li>
                                </ul>
                            @endif

                        </div>

                    </div>

                </div>
            </div>
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
                <button type="button" class="btn btn-success heading-btn" data-toggle="modal" data-target="#modal_full">
                    <i class="icon-plus3 position-left"></i>
                    Добавить изображения
                </button>
            </div>

        </div>
    </div>
@endsection

@section('js')
    @include('admin.layout.modal')
    <script src="/admin/js/app.min.js"></script>
    <script src="/admin/js/switchery.min.js"></script>
    <script src="/admin/js/dropzone.min.js"></script>
    <script>
        $(document).ready(function () {

            let elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
            elems.forEach(function (html) {
                new Switchery(html);
            });

            //  dropzone
            Dropzone.options.dropzoneMultiple = {
                url: $('.form-images').attr('action'),
                dictDefaultMessage: 'Перетащите изображения для загрузки ' +
                '<span>или кликните чтобы их выбрать</span>',
                maxFilesize: 1.5,
                autoProcessQueue: false
            };

            //  создать миниатюру
            $('#create-thumbnail').click(function () {

                $('.create-thumbnail').toggle();
            });

            //  изменить размер
            $('#change-size').click(function () {

                $('.change-size').toggle();
            });
        });
    </script>
    <script src="/admin/js/jquery_ui.js"></script>
    <script src="/admin/js/fancytree.js"></script>
    <script src="/admin/js/extra_trees.js"></script>
@endsection