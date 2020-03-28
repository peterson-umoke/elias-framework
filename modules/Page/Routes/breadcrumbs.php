<?php

// begin
Breadcrumbs::for("admin.pages.index", function ($trail, $title) {
    $trail->parent("admin.home");
    $trail->push($title, route("admin.pages.index"));
});

Breadcrumbs::for("admin.pages.create", function ($trail, $title) {
    $trail->parent("admin.pages.index", "All Pages");
    $trail->push($title, route("admin.pages.create"));
});

Breadcrumbs::for("admin.pages.edit", function ($trail, $title, $id) {
    $trail->parent("admin.pages.index", "All Pages");
    $trail->push($title, route("admin.pages.edit", $id));
});

Breadcrumbs::for("admin.pages.show", function ($trail, $title, $id) {
    $trail->parent("admin.pages.index", "All Pages");
    $trail->push($title, route("admin.pages.show", $id));
});
//end
