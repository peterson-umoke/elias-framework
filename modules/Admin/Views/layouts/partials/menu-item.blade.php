@if ((!isset($item['topnav']) || (isset($item['topnav']) && !$item['topnav'])) && (!isset($item['topnav_right']) || (isset($item['topnav_right']) && !$item['topnav_right'])) && (!isset($item['topnav_user']) || (isset($item['topnav_user']) && !$item['topnav_user'])))
    @if (is_string($item))
        <li @if (isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-divider">{{ $item }}</li>
    @elseif (isset($item['header']))
        <li @if (isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-divider">{{ $item['header'] }}</li>
    @elseif (isset($item['search']) && $item['search'])
        <li @if (isset($item['id'])) id="{{ $item['id'] }}" @endif>
            <form action="{{ $item['href'] }}" method="{{ $item['method'] }}" class="form-inline">
                <div class="input-group">
                    <input class="form-control form-control-sidebar" type="search" name="{{ $item['input_name'] }}"
                           placeholder="{{ $item['text'] ?? "" }}" aria-label="{{ $item['aria-label'] ?? $item['text'] ?? "" }}">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </li>
    @else
        @php $submenu_id = Str::random() @endphp
        <li @if (isset($item['id'])) id="{{ $item['id'] }}"
            @endif class="nav-item">
            <a class="nav-link {{ $item['class'] }} @if(isset($item['shift'])) {{ $item['shift'] }} @endif"
               href="{{ $item['href'] }}"
               @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
               @if (isset($item['submenu'])) data-toggle="collapse" aria-expanded="false"
               data-target="#submenu-{{ $submenu_id }}" aria-controls="submenu-{{ $submenu_id }}" @endif
            >
                <i class="{{ $item['icon'] ?? 'fa fa-fw fa-user-circle' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
                {{ $item['text'] ?? "" }}

                @if (isset($item['submenu']))
                    {{--                    <i class="fas fa-angle-left right"></i>--}}
                @endif
                @if (isset($item['label']))
                    <span
                        class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">{{ $item['label'] }}</span>
                @endif
            </a>
            @if (isset($item['submenu']))
                <div id="submenu-{{ $submenu_id }}" class="collapse submenu @if (isset($item['submenu'])){{ $item['submenu_class'] }}@endif" style="">
                    <ul class="nav flex-column">
                        @each('admin::layouts.partials.menu-item', $item['submenu'], 'item')
                    </ul>
                </div>
            @endif
        </li>
    @endif
@endif
