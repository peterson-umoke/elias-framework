@extends("admin::layouts.page")
@section("title", $title)
@section("page_title", $title)
@section("page_breadcrumbs", Breadcrumbs::render("admin.pages.create", $title))

@section('content')
    {!! Form::open(['route' => ['admin.pages.update',$page->id], 'method' => 'put']) !!}
    @include("page::admin.buttons", ["btnTitle" => "Update Page"])

    <div class="row">
        <div class="col">
            <div class="form-group row">
                <div class="col">
                    {!! Form::text('title',$page->title, ["placeholder" => "Enter the title", "style" => "font-size: 1.5em;", 'class' => 'p-2 form-control'])!!}
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    {!! Form::text('route',$page->route, ["placeholder" => "Enter the Page Route", 'class' => 'form-control'])!!}
                    @error('route')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group row">
                <div class="col">
                    {!! Form::textarea('pcontent',$page->content,["id" => "pcontent", "placeholder" => "Enter the content", 'class' => 'form-control'])!!}
                    @error('pcontent')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h3>Hints</h3>
                    <ul style="margin-left:0; padding-left: 10px;">
                        <li><small>Press F11 for Fullscreen Editing</small></li>
                        <li><small>Press ESC to close fullscreen</small></li>
                        <li><small>CTRL + Space autocomplete</small></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <h3 class="card-header">Search Engine Optimizations</h3>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('seo_title', 'SEO Title:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('seo_title',$page->seo_title, ['class' => 'form-control'])!!}
                            @error('seo_title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('seo_content', 'SEO Description:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('seo_content',$page->seo_content, ['class' => 'form-control'])!!}
                            @error('seo_content')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('seo_keywords', 'SEO Keywords:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('seo_keywords',$page->seo_keywords, ['class' => 'form-control'])!!}
                            @error('seo_keywords')
                            <span class="invalid-feedback" role="alert">
                         Pa               <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('name', 'Slug:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('name',$page->name, ['class' => 'form-control'])!!}
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("page::admin.buttons", ["btnTitle" => "Update Page"])
    {!! Form::close() !!}
@endsection


@push("css")
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/combine/npm/codemirror@5.45.0/lib/codemirror.min.css,npm/codemirror@5.45.0/theme/monokai.min.css,npm/codemirror@5.45.0/theme/dracula.min.css,npm/codemirror@5.45.0/addon/search/matchesonscrollbar.min.css,npm/codemirror@5.45.0/addon/scroll/simplescrollbars.min.css,npm/codemirror@5.45.0/addon/hint/show-hint.min.css,npm/codemirror@5.45.0/addon/fold/foldgutter.min.css,npm/codemirror@5.45.0/addon/display/fullscreen.min.css">
@endpush

@push("js")
    <script
        src="https://cdn.jsdelivr.net/combine/npm/codemirror@5.45.0,npm/codemirror@5.45.0/mode/javascript/javascript.min.js,npm/codemirror@5.45.0/mode/css/css.min.js,npm/codemirror@5.45.0/addon/search/jump-to-line.min.js,npm/codemirror@5.45.0/addon/search/match-highlighter.min.js,npm/codemirror@5.45.0/addon/search/matchesonscrollbar.min.js,npm/codemirror@5.45.0/addon/search/search.min.js,npm/codemirror@5.45.0/addon/search/searchcursor.min.js,npm/codemirror@5.45.0/addon/selection/active-line.min.js,npm/codemirror@5.45.0/addon/selection/mark-selection.min.js,npm/codemirror@5.45.0/addon/selection/selection-pointer.min.js,npm/codemirror@5.45.0/addon/scroll/annotatescrollbar.min.js,npm/codemirror@5.45.0/addon/scroll/scrollpastend.min.js,npm/codemirror@5.45.0/addon/scroll/simplescrollbars.min.js,npm/codemirror@5.45.0/addon/lint/css-lint.min.js,npm/codemirror@5.45.0/addon/lint/javascript-lint.min.js,npm/codemirror@5.45.0/addon/hint/css-hint.min.js,npm/codemirror@5.45.0/addon/hint/javascript-hint.min.js,npm/codemirror@5.45.0/addon/hint/show-hint.min.js,npm/codemirror@5.45.0/addon/hint/anyword-hint.min.js,npm/codemirror@5.45.0/addon/fold/brace-fold.min.js,npm/codemirror@5.45.0/addon/fold/comment-fold.min.js,npm/codemirror@5.45.0/addon/fold/foldcode.min.js,npm/codemirror@5.45.0/addon/fold/foldgutter.min.js,npm/codemirror@5.45.0/addon/fold/indent-fold.min.js,npm/codemirror@5.45.0/addon/fold/markdown-fold.min.js,npm/codemirror@5.45.0/addon/fold/xml-fold.min.js,npm/codemirror@5.45.0/addon/edit/closebrackets.min.js,npm/codemirror@5.45.0/addon/edit/closetag.min.js,npm/codemirror@5.45.0/addon/edit/continuelist.min.js,npm/codemirror@5.45.0/addon/edit/matchbrackets.min.js,npm/codemirror@5.45.0/addon/edit/matchtags.min.js,npm/codemirror@5.45.0/addon/edit/trailingspace.min.js,npm/codemirror@5.45.0/addon/display/fullscreen.min.js,npm/codemirror@5.45.0/addon/display/panel.min.js,npm/codemirror@5.45.0/addon/display/placeholder.min.js,npm/codemirror@5.45.0/addon/display/rulers.min.js,npm/codemirror@5.45.0/addon/display/autorefresh.min.js,npm/codemirror@5.45.0/addon/comment/comment.min.js,npm/codemirror@5.45.0/addon/comment/continuecomment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.52.0/mode/xml/xml.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.52.0/mode/clike/clike.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5/mode/php/php.min.js"></script>


    <script>
        (function ($) {
            $(document).ready(function () {
                var codeEditor = $("#pcontent")[0];
                var editor = CodeMirror.fromTextArea(codeEditor, {
                    mode: 'application/x-httpd-php',
                    extraKeys: {
                        "Ctrl-Space": "autocomplete",
                        "F11": function (cm) {
                            cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                            $(".dashboard-header").hide();
                        },
                        "Esc": function (cm) {
                            if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                            $(".dashboard-header").show();
                        }
                    },
                    placeholder: 'Enter Your Content Here',
                    lineNumbers: true,
                    matchBrackets: true,
                    indentUnit: 2,
                    indentWithTabs: true,
                    autoCloseTags: true,
                    smartIndent: true,
                    // theme: 'monokai',
                    showHint: true,
                    continueComments: true,
                    styleActiveLine: true,
                    styleSelectedText: true,
                    highlightSelectionMatches: true,
                });
            });

            $(document).keydown(function (event) {
                if ((event.ctrlKey || event.metaKey) && event.which == 83) {
                    // Save Function
                    $("form").submit();
                    event.preventDefault();
                    return false;
                }
            });
        })(jQuery);
    </script>
@endpush
