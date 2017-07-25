@if(!$children->isEmpty())
    <ul class="treeview-menu" style="display: none;">
        @foreach ($children as $item)
            @php
                $children1 = $item->children()->get();
            @endphp
                <li><a href="{{route('category.show',$item->id)}}"><i
                                class="fa fa-circle-o"></i>{{$item->name}}
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span></a>
            @php
                $children = $item->children()->get();
            @endphp
                @include('admin.incs.category')

            </li>

        @endforeach

    </ul>
@endif