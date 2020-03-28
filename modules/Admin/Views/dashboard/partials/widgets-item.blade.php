@if(current_admin()->can($item["can"] ?? "read-profile"))
    @isset($item["html"])
        <div class="col">
            <div
                class="card {{$item['class'] ?? ""}} @isset($item['border_class']) border-3 border-top border-top-{{$item["border_class"]}} @endempty">
                <div class="card-body">
                    <h5 class="text-muted">{{$item["text"]}}</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{!! $item["html"] !!}</h1>
                    </div>
                    @isset($item["html_after"])
                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            {!! $item["html_after"] !!}
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    @endisset
@endif
