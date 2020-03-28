@if(!empty($item['can']) && current_admin()->can($item["can"] ?? "read-profile"))
    <li class="nav-item">
        <a class="nav-link" href="{{route($item["route"])}}">
            <i class="{{$item["icon"] ?? "fas fa-fw fa-plus"}}"></i> {{$item["text"]}}
        </a>
    </li>
@endif
