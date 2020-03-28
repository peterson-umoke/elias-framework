<?php

// begin
Breadcrumbs::for("admin.customers.index", function ($trail, $title) {
    $trail->parent("admin.home");
    $trail->push($title, route("admin.customers.index"));
});

Breadcrumbs::for("admin.customers.create", function ($trail, $title) {
    $trail->parent("admin.customers.index", "All Customers");
    $trail->push($title, route("admin.customers.create"));
});

Breadcrumbs::for("admin.customers.edit", function ($trail, $title, $id) {
    $trail->parent("admin.customers.index", "All Customers");
    $trail->push($title, route("admin.customers.edit", $id));
});

Breadcrumbs::for("admin.customers.show", function ($trail, $title, $id) {
    $trail->parent("admin.customers.index", "All Customers");
    $trail->push($title, route("admin.customers.show", $id));
});

Breadcrumbs::for("admin.customers.password.change", function ($trail, $title, $id) {
    $trail->parent("admin.customers.index", "All Customers");
    $trail->push("View Customer", route("admin.customers.show", $id));
    $trail->push($title, route("admin.customers.password.change", $id));
});
//end
