@extends("admin::layouts.page")
@section("title", $title)
@section("page_title", $title)
@section("page_breadcrumbs", Breadcrumbs::render("admin.pages.show", $title, $page->id))
@section("page_description")
    <div class="main-buttons">
        {!! Form::open(["route" => ["admin.pages.destroy", "page" => $page->id],"method" => "delete"]) !!}
        @if(current_admin()->can("update-pages"))
            <a href="{{route("admin.pages.edit", $page->id)}}" class="btn btn-success"><i
                    class="fas fa-edit"></i> Edit Page</a>
        @endif
        @if(current_admin()->can("update-profile"))
            <a target="_blank" href="{{route("pages.show", $page->name)}}" class="btn btn-brand"><i
                    class="fas fa-globe"></i> View Page</a>
        @endif
        @if(current_admin()->can("delete-pages"))
            <button title="Delete Account" type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash-alt fa-fw"></i> Delete Page
            </button>
        @endif
        {!! Form::close() !!}
    </div>
@endsection

@section("content")
    <iframe style="background-color: white; border:1px solid #ccc; margin-top: 20px;" src="{{route("pages.show",$page->name)}}" frameborder="1"
            height="500" width="100%"></iframe>
@endsection
