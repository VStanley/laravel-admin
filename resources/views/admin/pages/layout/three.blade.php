<li class="tree-li">
    <span class="tree-title col-md-6">
        {{$page['title']}}
    </span>
    <span class="tree-template col-md-2">
        {{$page['template']}}
    </span>
    <span class="tree-show col-md-2">
            @if ($page['show_menu'] == 1)
                Да
            @else
                Нет
            @endif
    </span>
    <span class="tree-options col-md-2">
            <a href="#" class="text-muted" data-popup="tooltip" title="" data-original-title="Вверх">
                <i class=" icon-chevron-up"></i>
            </a>
            <a href="#" class="text-muted" data-popup="tooltip" title="" data-original-title="Вниз">
                <i class="icon-chevron-down"></i>
            </a>

            <a href="{{route('pages.edit', $page['id'])}}" class="text-primary" data-popup="tooltip"
               title="" data-original-title="Редактировать">
                <i class="icon-pencil7"></i>
            </a>

        <form action="{{route('pages.destroy', $page['id'])}}" method="post" style="display:inline-block;">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}
            <button type="submit" class="text-danger link-btn" data-popup="tooltip" title=""
                    data-original-title="Удалить">
                <i class="icon-trash"></i>
            </button>
            </form>
    </span>
</li>
@if (count($page['children']) > 0)
<ol class="tree-ul">
    @foreach($page['children'] as $page)
    @include('admin.pages.layout.three', $page)
    @endforeach
</ol>
@endif
