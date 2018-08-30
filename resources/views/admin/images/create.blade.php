@extends('admin.layout.base')

@section('header')
    <form action="{{route('images.store')}}" method="post" class="form-images form-horizontal"
          enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="page-header page-header-default">
            <div class="page-header-content">

                <div class="page-title">
                    <h4>
                        <i class="icon-images2"></i>
                        <span class="text-semibold ml-10">Изображения</span>
                        <small class="display-block">Добавить изображения</small>
                    </h4>
                </div>

                <div class="heading-elements">
                    <button type="button" class="btn btn-success heading-btn" id="sent-images">
                        <i class="icon-floppy-disk position-left"></i>
                        Загрузить
                    </button>
                </div>

            </div>
        </div>
        @endsection

        @section('content')
            <div class="row">

                <div class="col-md-8">

                    <div class="panel panel-white border-top-success">
                        <div class="panel-body">

                            @include('admin.errors')

                            <div class="dropzone" id="dropzone_multiple"></div>

                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="panel panel-white border-top-success">
                        <div class="panel-heading">
                            <h6 class="panel-title">Выберите категории</h6>
                        </div>
                        <div class="panel-body">

                            <div class="tree-checkbox-options">

                                @if (count($categoriesImages) > 0)
                                    <ul>
                                        @foreach ($categoriesImages as $categoryImage)
                                            @include('admin.images.layout.tree', $categoryImage)
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
    </form>
@endsection

@section('js')
    <script src="/admin/js/dropzone.min.js"></script>
    <script src="/admin/js/jquery_ui.js"></script>
    <script src="/admin/js/fancytree.js"></script>
    <script>
        $(document).ready(function () {

            $(".tree-checkbox-options").fancytree({
                checkbox: true,
                selectMode: 2
            });

            Dropzone.options.dropzoneMultiple = {

                url: $('.form-images').attr('action'),
                acceptedFiles: '.jpg, .jpeg',
                autoProcessQueue: false,
                maxFilesize: 1.5,

                dictDefaultMessage: 'Перетащите изображения для загрузки ' +
                '<span>или кликните чтобы их выбрать</span>',

                sending: function(file, xhr, formData){
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    formData.append('select', $('.tree-checkbox-options').fancytree('getTree').getSelectedNodes());
                },

                init: function () {

                    let thatDropzone = this;

                    $('#sent-images').click(function () {

                        let selected = $('.tree-checkbox-options').fancytree('getTree').getSelectedNodes();
                        
                        if (selected.length === 0){

                            $(function(){
                                new PNotify({
                                    title: 'Ошибка',
                                    text: 'Вы не выбрали категории!'
                                });
                            });
                            thatDropzone.removeFile();
                        }

                        thatDropzone.options.autoProcessQueue = true;
                        thatDropzone.processQueue()
                    });
                },

                success: function (file, done) {

                    // console.log(file);
                    console.log(done);
                }
            };
        })
    </script>
@endsection