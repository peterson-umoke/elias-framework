<?php

// Home
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Home', route('admin.home'));
});

Breadcrumbs::for('admin.settings', function ($trail, $page, $channel) {
    $trail->parent('admin.home');
    $trail->push("Settings for " . ucwords(str_replace(array("_", "-", "settings"), " ", $page)), route('admin.settings', ["page" => $page, "channel" => $channel]));
});

// begin
Breadcrumbs::for("admin.admins.index", function ($trail, $title) {
    $trail->parent("admin.home");
    $trail->push($title, route("admin.admins.index"));
});

Breadcrumbs::for("admin.admins.create", function ($trail, $title) {
    $trail->parent("admin.admins.index", "All Administrators");
    $trail->push($title, route("admin.admins.create"));
});

Breadcrumbs::for("admin.admins.edit", function ($trail, $title, $id) {
    $trail->parent("admin.admins.index", "All Administrators");
    $trail->push($title, route("admin.admins.edit", $id));
});

Breadcrumbs::for("admin.admins.show", function ($trail, $title, $id) {
    $trail->parent("admin.admins.index", "All Administrators");
    $trail->push($title, route("admin.admins.show", $id));
});

Breadcrumbs::for("admin.admins.password.change", function ($trail, $title, $id) {
    $trail->parent("admin.admins.index", "All Administrators");
    $trail->push("View Administrator", route("admin.admins.show", $id));
    $trail->push($title, route("admin.admins.password.change", $id));
});
// end

// begin
Breadcrumbs::for("admin.permissions.index", function ($trail, $title) {
    $trail->parent("admin.home");
    $trail->push($title, route("admin.permissions.index"));
});

Breadcrumbs::for("admin.permissions.create", function ($trail, $title) {
    $trail->parent("admin.permissions.index", "All Permissions");
    $trail->push($title, route("admin.permissions.create"));
});

Breadcrumbs::for("admin.permissions.edit", function ($trail, $title, $id) {
    $trail->parent("admin.permissions.index", "All Permissions");
    $trail->push($title, route("admin.permissions.edit", $id));
});

Breadcrumbs::for("admin.permissions.show", function ($trail, $title, $id) {
    $trail->parent("admin.permissions.index", "All Permissions");
    $trail->push($title, route("admin.permissions.show", $id));
});
// end

// begin
Breadcrumbs::for("admin.roles.index", function ($trail, $title) {
    $trail->parent("admin.home");
    $trail->push($title, route("admin.roles.index"));
});

Breadcrumbs::for("admin.roles.create", function ($trail, $title) {
    $trail->parent("admin.roles.index", "All Roles");
    $trail->push($title, route("admin.roles.create"));
});

Breadcrumbs::for("admin.roles.edit", function ($trail, $title, $id) {
    $trail->parent("admin.roles.index", "All Roles");
    $trail->push($title, route("admin.roles.edit", $id));
});

Breadcrumbs::for("admin.roles.show", function ($trail, $title, $id) {
    $trail->parent("admin.roles.index", "All Roles");
    $trail->push($title, route("admin.roles.show", $id));
});
// end

// begin
Breadcrumbs::for("admin.profile", function ($trail, $title) {
    $trail->parent("admin.home");
    $trail->push("All Administrators", route("admin.admins.index"));
    $trail->push($title, route("admin.profile"));
});

Breadcrumbs::for("admin.profile.password.change", function ($trail, $title) {
    $trail->parent("admin.profile", "My Profile");
    $trail->push($title, route("admin.profile.password.change"));
});
// end
