<li class="folder expanded" data-id="44">
        {{$categoryImage['id']}}
    @if (count($categoryImage['children']) > 0)
        <ul>
            @foreach($categoryImage['children'] as $categoryImage)
                @include('admin.images.layout.three', $categoryImage)
            @endforeach
        </ul>
    @endif

</li>