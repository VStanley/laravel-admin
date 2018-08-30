<li class="folder expanded" id="">

        {{$categoryImage['category']}} - ({{$categoryImage['id']}})

    @if (count($categoryImage['children']) > 0)
        <ul>
            @foreach($categoryImage['children'] as $categoryImage)
                @include('admin.images.layout.tree', $categoryImage)
            @endforeach
        </ul>
    @endif

</li>