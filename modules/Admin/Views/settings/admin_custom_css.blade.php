<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::textarea('admin_custom_css', $settings->get_setting_value("admin_custom_css", $channel), ["id" => "admin_custom_css", 'class' => 'form-control',"placeholder" =>
            "Write customized CSS Code blocks here", "style" => "height:300px;"]) !!}
            @error('admin_custom_css')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h3>Hints</h3>
                <ul style="margin-left:0; padding-left: 10px;">
                    <li><small>Press F11 for Fullscreen Editing</small></li>
                    <li><small>Press ESC to close fullscreen</small></li>
                    <li><small>CTRL + Space autocomplete</small></li>
                    <li><small>Remember to insert the style tag before inserting any css code, else it wont
                            work!!!</small></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@push("css")
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/combine/npm/codemirror@5.45.0/lib/codemirror.min.css,npm/codemirror@5.45.0/theme/monokai.min.css,npm/codemirror@5.45.0/theme/dracula.min.css,npm/codemirror@5.45.0/addon/search/matchesonscrollbar.min.css,npm/codemirror@5.45.0/addon/scroll/simplescrollbars.min.css,npm/codemirror@5.45.0/addon/hint/show-hint.min.css,npm/codemirror@5.45.0/addon/fold/foldgutter.min.css,npm/codemirror@5.45.0/addon/display/fullscreen.min.css">
@endpush

@push("js")
    <script
        src="https://cdn.jsdelivr.net/combine/npm/codemirror@5.45.0,npm/codemirror@5.45.0/mode/javascript/javascript.min.js,npm/codemirror@5.45.0/mode/css/css.min.js,npm/codemirror@5.45.0/addon/search/jump-to-line.min.js,npm/codemirror@5.45.0/addon/search/match-highlighter.min.js,npm/codemirror@5.45.0/addon/search/matchesonscrollbar.min.js,npm/codemirror@5.45.0/addon/search/search.min.js,npm/codemirror@5.45.0/addon/search/searchcursor.min.js,npm/codemirror@5.45.0/addon/selection/active-line.min.js,npm/codemirror@5.45.0/addon/selection/mark-selection.min.js,npm/codemirror@5.45.0/addon/selection/selection-pointer.min.js,npm/codemirror@5.45.0/addon/scroll/annotatescrollbar.min.js,npm/codemirror@5.45.0/addon/scroll/scrollpastend.min.js,npm/codemirror@5.45.0/addon/scroll/simplescrollbars.min.js,npm/codemirror@5.45.0/addon/lint/css-lint.min.js,npm/codemirror@5.45.0/addon/lint/javascript-lint.min.js,npm/codemirror@5.45.0/addon/hint/css-hint.min.js,npm/codemirror@5.45.0/addon/hint/javascript-hint.min.js,npm/codemirror@5.45.0/addon/hint/show-hint.min.js,npm/codemirror@5.45.0/addon/hint/anyword-hint.min.js,npm/codemirror@5.45.0/addon/fold/brace-fold.min.js,npm/codemirror@5.45.0/addon/fold/comment-fold.min.js,npm/codemirror@5.45.0/addon/fold/foldcode.min.js,npm/codemirror@5.45.0/addon/fold/foldgutter.min.js,npm/codemirror@5.45.0/addon/fold/indent-fold.min.js,npm/codemirror@5.45.0/addon/fold/markdown-fold.min.js,npm/codemirror@5.45.0/addon/fold/xml-fold.min.js,npm/codemirror@5.45.0/addon/edit/closebrackets.min.js,npm/codemirror@5.45.0/addon/edit/closetag.min.js,npm/codemirror@5.45.0/addon/edit/continuelist.min.js,npm/codemirror@5.45.0/addon/edit/matchbrackets.min.js,npm/codemirror@5.45.0/addon/edit/matchtags.min.js,npm/codemirror@5.45.0/addon/edit/trailingspace.min.js,npm/codemirror@5.45.0/addon/display/fullscreen.min.js,npm/codemirror@5.45.0/addon/display/panel.min.js,npm/codemirror@5.45.0/addon/display/placeholder.min.js,npm/codemirror@5.45.0/addon/display/rulers.min.js,npm/codemirror@5.45.0/addon/display/autorefresh.min.js,npm/codemirror@5.45.0/addon/comment/comment.min.js,npm/codemirror@5.45.0/addon/comment/continuecomment.min.js"></script>
    <script>
        (function ($) {
            $(document).ready(function () {
                var codeEditor = $("#admin_custom_css")[0];
                var editor = CodeMirror.fromTextArea(codeEditor, {
                    mode: 'css',
                    extraKeys: {
                        "Ctrl-Space": "autocomplete",
                        "F11": function (cm) {
                            cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                        },
                        "Esc": function (cm) {
                            if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                        }
                    },
                    placeholder: '/** always start your code with <style></style> */',
                    lineNumbers: true,
                    indentUnit: 2,
                    autoCloseTags: true,
                    smartIndent: true,
                    theme: 'monokai',
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
