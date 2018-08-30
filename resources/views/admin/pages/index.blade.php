@extends('admin.layout.base')

@section('content')
<div class="row">

    <div class="panel panel-flat border-top-success">

        <ul class="ul-header">
            <li class="flex-li">
                <span class="tree-title col-md-6">Заголовок</span>
                <span class="tree-template col-md-2">Шаблон</span>
                <span class="tree-show col-md-2">Видимость</span>
                <span class="tree-options col-md-2">Управление</span>
            </li>
        </ul>

        @if (count($pages) > 0)
        <ol class="tree-ul">
            @foreach ($pages as $page)
            @include('admin.pages.layout.three', $page)
            @endforeach
        </ol>
        @else
        <ul>
            <li class="lead" style="list-style: none">Добавьте страницы</li>
        </ul>
        @endif

    </div>

</div>
@endsection

@section('header')
<div class="page-header page-header-default">
    <div class="page-header-content">

        <div class="page-title">
            <h4>
                <i class=" icon-files-empty2"></i>
                <span class="text-semibold ml-10">Страницы</span>
                <small class="display-block">Управление страницами сайта</small>
            </h4>
        </div>

        <div class="heading-elements">
            <a href="{{route('pages.create')}}" type="button" class="btn btn-success heading-btn">
                <i class="icon-plus3 position-left"></i>
                Добавить страницу
            </a>
        </div>

    </div>
</div>
@endsection

@section('js')
@endsection