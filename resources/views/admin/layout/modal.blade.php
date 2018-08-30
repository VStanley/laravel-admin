<!-- Full width modal -->
<div id="modal_full" class="modal fade">
    <div class="modal-dialog modal-full">
        <div class="modal-content">

            <form action="{{route('images.store')}}" method="post" class="form-images form-horizontal"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-9">

                            <div class="panel panel-white border-top-success">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Настройки</h6>
                                    <div class="heading-elements">
                                        <div class="heading-btn">
                                            <button type="submit" class="btn btn-success heading-btn load-dropzone">
                                                <i class="icon-floppy-disk position-left"></i>
                                                Загрузить изображения
                                            </button>
                                        </div>
                                        <div class="heading-btn">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Закрыть окно
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group form-group-xs">
                                                <div class="switchery-xs checkbox checkbox-switchery">
                                                    <label class="col-md-4 control-label">
                                                        <input type="checkbox" name="change-size" class="switchery"
                                                               id="change-size">
                                                        Изменить размер
                                                    </label>
                                                    <div class="change-size">
                                                        <label class="col-md-1 pl-5 mr-5 control-label">Ширина:</label>
                                                        <div class="col-md-2">
                                                            <input type="text" maxlength="4"
                                                                   class="form-control input-xs" disabled>
                                                        </div>
                                                        <label class="col-md-1 pl-5 control-label">Высота:</label>
                                                        <div class="col-md-2">
                                                            <input type="text" maxlength="4"
                                                                   class="form-control input-xs" disabled>
                                                        </div>
                                                        <label class="col-md-1 control-label pl-5">px</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group form-group-xs">
                                                <div class="switchery-xs checkbox checkbox-switchery">
                                                    <label class="col-md-4 control-label">
                                                        <input type="checkbox" name="create-thumbnail" class="switchery"
                                                               id="create-thumbnail">
                                                        Создать миниатюры
                                                    </label>
                                                    <div class="create-thumbnail">
                                                        <label class="col-md-1 pl-5 mr-5 control-label">Ширина:</label>
                                                        <div class="col-md-2">
                                                            <input type="text" maxlength="4"
                                                                   class="form-control input-xs" disabled>
                                                        </div>
                                                        <label class="col-md-1 pl-5 control-label">Высота:</label>
                                                        <div class="col-md-2">
                                                            <input type="text" maxlength="4"
                                                                   class="form-control input-xs" disabled>
                                                        </div>
                                                        <label class="col-md-1 control-label pl-5">px</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="panel panel-white border-top-success">
                                <div class="panel-body">

                                    @include('admin.errors')

                                    <div class="dropzone" id="dropzone_multiple"></div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-white border-top-success">

                                <div class="panel-body">

                                    <div class="content-group">
                                        <h6 class="text-semibold heading-divided">
                                            <i class="icon-folder6 position-left"></i> Выберите категорию
                                        </h6>

                                        <div class="tree-checkbox-options tree-modal">

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
                </div>

            </form>

        </div>
    </div>
</div>
<!-- /full width modal -->