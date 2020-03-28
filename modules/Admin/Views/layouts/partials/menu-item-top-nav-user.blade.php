<a class="dropdown-item" @isset($item['target']) target="{{$item['target'] ?? ""}}"
   @endisset href="@isset($item['url']) {{url($item['url'])}} @endisset @isset($item['route']) {{route($item['route'])}} @endisset"><i
        class="{{ $item['icon'] ?? 'far fa-fw fa-circle mr-2' }}"></i>{{$item['text']}}</a>
