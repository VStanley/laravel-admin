<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">

                    <div class="media-body">
                        <span class="media-heading text-semibold">Панель администратора</span>
                        <div class="text-size-mini text-muted">
                            Короткие стрижки
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header">
                        <span>Управление</span>
                    </li>

                    @if ( $menu  == 'dashboard')
                        <li class="active">
                    @else
                        <li>@endif
                    <a href="/dashboard">
                            <i class="icon-home4"></i>
                            <span>Информация</span>
                        </a>
                    </li>

                    @if ( $menu  == 'pages')
                        <li class="active">
                    @else
                        <li>@endif
                        <a href="/dashboard/pages">
                            <i class=" icon-files-empty"></i>
                            <span>Страницы</span>
                        </a>
                    </li>

                    @if ( $menu  == 'options')
                        <li class="active">
                    @else
                        <li>@endif
                        <a href="/dashboard/options">
                            <i class="icon-grid5"></i>
                            <span>Параметры</span>
                        </a>
                    </li>

                    @if ( $menu  == 'images')
                        <li class="active">
                    @else
                        <li>@endif
                    <a href="{{route('images.index')}}">
                        <i class="icon-images2"></i>
                        <span>Изображения</span>
                    </a>
                    <ul>
                        <li><a href="{{route('images.index')}}">Библиотека</a></li>
                        <li><a href="{{route('categoriesImages.index')}}">Категории</a></li>
                    </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>