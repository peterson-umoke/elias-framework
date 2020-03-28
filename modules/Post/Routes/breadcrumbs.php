<?php

// begin
Breadcrumbs::for("admin.posts.index", function ($trail, $title) {
    $trail->parent("admin.home");
    $trail->push($title, route("admin.posts.index"));
});

Breadcrumbs::for("admin.posts.create", function ($trail, $title) {
    $trail->parent("admin.posts.index", "All Posts");
    $trail->push($title, route("admin.posts.create"));
});

Breadcrumbs::for("admin.posts.edit", function ($trail, $title, $id) {
    $trail->parent("admin.posts.index", "All Posts");
    $trail->push($title, route("admin.posts.edit", $id));
});

Breadcrumbs::for("admin.posts.show", function ($trail, $title, $id) {
    $trail->parent("admin.posts.index", "All Posts");
    $trail->push($title, route("admin.posts.show", $id));
});
//end


// begin
Breadcrumbs::for("admin.posts.categories.index", function ($trail, $title) {
    $trail->parent("admin.posts.index","\"All Posts\"");
    $trail->push($title, route("admin.posts.categories.index"));
});

Breadcrumbs::for("admin.posts.categories.create", function ($trail, $title) {
    $trail->parent("admin.posts.categories.index", "All Posts");
    $trail->push($title, route("admin.posts.categories.create"));
});

Breadcrumbs::for("admin.posts.categories.edit", function ($trail, $title, $id) {
    $trail->parent("admin.posts.categories.index", "All Posts");
    $trail->push($title, route("admin.posts.categories.edit", $id));
});

Breadcrumbs::for("admin.posts.categories.show", function ($trail, $title, $id) {
    $trail->parent("admin.posts.categories.index", "All Posts");
    $trail->push($title, route("admin.posts.categories.show", $id));
});
//end
