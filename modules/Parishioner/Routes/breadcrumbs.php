<?php

// begin
Breadcrumbs::for("admin.parishioners.index", function ($trail, $title) {
    $trail->parent("admin.home");
    $trail->push($title, route("admin.parishioners.index"));
});

Breadcrumbs::for("admin.parishioners.create", function ($trail, $title) {
    $trail->parent("admin.parishioners.index", "All Parishioners");
    $trail->push($title, route("admin.parishioners.create"));
});

Breadcrumbs::for("admin.parishioners.edit", function ($trail, $title, $id) {
    $trail->parent("admin.parishioners.index", "All Parishioners");
    $trail->push($title, route("admin.parishioners.edit", $id));
});

Breadcrumbs::for("admin.parishioners.show", function ($trail, $title, $id) {
    $trail->parent("admin.parishioners.index", "All Parishioners");
    $trail->push($title, route("admin.parishioners.show", $id));
});
//end
