@if (session()->has('notifications.message'))

    @if (session()->get('notifications.model') === 'toast')
        <div class="notify-alert notify-{{ session()->get('notifications.type') }} {{ config('notifications.theme') }} animated {{ config('notifications.animate.in_class') }}" role="alert">
            <div class="notify-alert-icon"><i class="{{ session()->get('notifications.icon') }}"></i></div>
            <div class="notify-alert-text">
                <h4>{{ session()->get('notifications.title') ?? session()->get('notifications.type') }}</h4>
                <p>{{ session()->get('notifications.message') }}</p>
            </div>
            <div class="notify-alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="flaticon2-cross"></i></span>
                </button>
            </div>
        </div>
    @endif

    @if (session()->get('notifications.model') === 'smiley')
        <div class="smiley-alert smiley-{{ session()->get('notifications.type') }} {{ config('notifications.theme') }} animated {{ config('notifications.animate.in_class') }}" role="alert">
            <div class="smiley-icon"><span>{{ session()->get('notifications.icon') }}</span></div>
            <div class="smiley-text">
                <p><span class="title">{{ session()->get('notifications.type') }}!</span> {{ session()->get('notifications.message') }}</p>
            </div>
            <div class="smiley-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="flaticon2-cross"></i></span>
                </button>
            </div>
        </div>
    @endif

    @if (session()->get('notifications.model') === 'drake')
        <div class="drake-alert drake-{{ session()->get('notifications.type') }} animated {{ config('notifications.animate.in_class') }}" role="alert">
            <div class="drake-icon">
                <span><i class="flaticon2-check-mark"></i></span>
                <h4>{{ session()->get('notifications.message') }}</h4>
            </div>
        </div>
    @endif

    @if (session()->get('notifications.model') === 'connect')
        <div class="connectify-alert connectify-{{ session()->get('notifications.type') }} {{ config('notifications.theme') }} animated {{ config('notifications.animate.in_class') }}" role="alert">
            <div class="connectify-icon">
                <i class="flaticon-like"></i><span>{{ session()->get('notifications.type') }}</span>
            </div>
            <div class="connectify-text">
                <h4>{{ session()->get('notifications.title') }}</h4>
                <p>{{ session()->get('notifications.message') }}</p>
            </div>
            <div class="connectify-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="flaticon2-cross"></i>
                    </span>
                </button>
            </div>
        </div>
    @endif

    @if (session()->get('notifications.model') === 'emotify')
        <div class="emoticon-alert emoticon-{{ session()->get('notifications.type') }} animated {{ config('notifications.animate.in_class') }}" role="alert">
            <div class="emoticon-icon"><span></span></div>
            <div class="emoticon-text">
                <p>{{ session()->get('notifications.message') }}</p>
            </div>
            <div class="emoticon-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="flaticon2-cross"></i></span>
                </button>
            </div>
        </div>
    @endif

@endif

{{ session()->forget('notifications.message') }}

<script>

    var notify = {
        timeout: "{{ config('notifications.animate.timeout') }}",
        animatedIn: "{{ config('notifications.animate.in_class') }}",
        animatedOut: "{{ config('notifications.animate.out_class') }}",
        position: "{{ config('notifications.position') }}"
    }

</script>
