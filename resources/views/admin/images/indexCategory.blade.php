@extends('admin.layout.base')

@section('content')
    <div class="row">

        <div class="col-md-7">
            <div class="panel panel-white border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Создание категории</h6>
                </div>
                <div class="panel-body">

                    @include('admin.errors')

                    <form action="{{route('categoriesImages.store')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Выберите родителя</label>
                            <select class="select-search" name="owner_id">
                                <option value="0">Нет</option>

                                @foreach ($categoriesList as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="category" class="form-control"
                                       placeholder="Добавить категорию">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="submit">
                                        Добавить
                                    </button>
                                </span>
                            </div>
                        </div>

                    </form>


                </div>
            </div>

            <div class="panel panel-white border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Удаление категории</h6>
                </div>
                <div class="panel-body">

                    <form action="/dashboard/categoriesImages/0" id="delete-category" method="post">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-10">
                                <select class="select-search" name="owner_id">
                                    <option value="0">Не выбрано</option>
                                    @foreach ($categoriesList as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-2 text-right">
                                <button class="btn btn-warning" type="submit">
                                    Удалить
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

        <div class="col-md-5">
            <div class="panel panel-white border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Дерево категорий</h6>
                </div>
                <div class="panel-body">

                    <div class="tree-default">

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
@endsection

@section('header')
    <div class="page-header page-header-default">
        <div class="page-header-content">

            <div class="page-title">
                <h4>
                    <i class="icon-folder6"></i>
                    <span class="text-semibold ml-10">Категории</span>
                    <small class="display-block">Категории изображений</small>
                </h4>
            </div>


        </div>
    </div>
@endsection


@section('js')
    <script src="/admin/js/select2.min.js"></script>
    <script src="/admin/js/jquery_ui.js"></script>
    <script src="/admin/js/fancytree.js"></script>
    <script>
        $(document).ready(function () {

            $('#delete-category select').change(function () {
                let action = '/dashboard/categoriesImages/' + $(this).val();
                $('#delete-category').attr('action', action)
            });

            $('select').select2({
                // options
            });

            $(".tree-default").fancytree({
                init: function(event, data) {
                    $('.has-tooltip .fancytree-title').tooltip();
                }
            });
        })
    </script>
@endsection