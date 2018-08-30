@extends('admin.layout.base')

@section('content')
    <div class="row">

        <div class="panel panel-flat border-top-success">

            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Название</th>
                        <th>slug</th>
                        <th>Страница</th>
                        <th class="settings">Управление</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (count($options) > 0)

                        @foreach ($options as $parameter)
                            <tr>
                                <td>{{$parameter->id}}</td>
                                <td>{{$parameter->name}}</td>
                                <td>{{$parameter->slug}}</td>
                                <td>
                                    @if($parameter->page_id == 0)
                                        отображается везде
                                    @else
                                        {{$parameter->getPage($parameter->page_id)->title}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('options.edit', $parameter->id)}}" class="text-primary" data-popup="tooltip"
                                       title="" data-original-title="Редактировать">
                                        <i class="icon-pencil7"></i>
                                    </a>

                                    <form action="{{route('options.destroy', $parameter->id)}}" method="post" style="display:inline-block;">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <button type="submit" class="text-danger link-btn" data-popup="tooltip" title=""
                                                data-original-title="Удалить">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="lead">Добавьте параметры</td>
                        </tr>
                    @endif

                    </tbody>
                </table>

            </div>

        </div>

    </div>
@endsection

@section('header')
    <div class="page-header page-header-default">
        <div class="page-header-content">

            <div class="page-title">
                <h4>
                    <i class="icon-grid5"></i>
                    <span class="text-semibold ml-10">Параметры</span>
                    <small class="display-block">Общая информация</small>
                </h4>
            </div>

            <div class="heading-elements">
                <a href="{{route('options.create')}}" type="button" class="btn btn-success heading-btn">
                    <i class="icon-plus3 position-left"></i>
                    Добавить параметр
                </a>
            </div>

        </div>
    </div>
@endsection

@section('js')
@endsection