<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;
use App\Models\User;
// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('welcome', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('welcome'));
});

Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('welcome');
    $trail->push("Users");
});

Breadcrumbs::for('users:profile', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push("My Profile", route('users:profile'));
});

Breadcrumbs::for('welcome:dash', function (BreadcrumbTrail $trail) {
    $trail->parent('welcome');
    $trail->push("Dashboard", route('welcome:dash'));
});

Breadcrumbs::for('tenantmeta:create', function (BreadcrumbTrail $trail) {
    $trail->parent('welcome:dash');
    $trail->push("New Application", route('tenantmeta:create'));
});

Breadcrumbs::for('messages:inbox', function (BreadcrumbTrail $trail) {
    $trail->parent('welcome');
    $trail->push("Messages", route('messages:inbox'));
});

Breadcrumbs::for('search', function (BreadcrumbTrail $trail) {
    $trail->parent('welcome');
    $trail->push("Search");
});

Breadcrumbs::for('search:groups', function (BreadcrumbTrail $trail) {
    $trail->parent('search');
    $trail->push("Groups", route('search:groups'));
});

Breadcrumbs::for('search:roles', function (BreadcrumbTrail $trail) {
    $trail->parent('search');
    $trail->push("Roles", route('search:roles'));
});

Breadcrumbs::for('search:users', function (BreadcrumbTrail $trail) {
    $trail->parent('search');
    $trail->push("Users", route('search:users'));
});

Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Page Not Found');
});

Breadcrumbs::for('laratrust', function (BreadcrumbTrail $trail) {
    $trail->parent('welcome');
    $trail->push("ACL Editor");
});

Breadcrumbs::for('laratrust.roles', function (BreadcrumbTrail $trail) {
    $trail->parent('laratrust');
    $trail->push("Roles");
});

Breadcrumbs::for('laratrust.roles-assignment', function (BreadcrumbTrail $trail) {
    $trail->parent('laratrust');
    $trail->push("Role Assignment");
});

Breadcrumbs::for('laratrust.permissions', function (BreadcrumbTrail $trail) {
    $trail->parent('laratrust');
    $trail->push("Permissions");
});

Breadcrumbs::for('laratrust.roles-assignment.index', function (BreadcrumbTrail $trail) {
    $trail->parent('laratrust.roles-assignment');
    $trail->push("Overview", route('laratrust.roles-assignment.index'));
});

Breadcrumbs::for('laratrust.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('laratrust.permissions');
    $trail->push("Overview", route('laratrust.permissions.index'));
});

Breadcrumbs::for('laratrust.roles-assignment.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('laratrust.roles-assignment');
    $trail->push("Editor", route('laratrust.roles-assignment.edit', ['roles_assignment', 'model']));
});

Breadcrumbs::for('laratrust.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('laratrust.roles');
    $trail->push("Overview", route('laratrust.roles.index'));
});

Breadcrumbs::for('laratrust.permissions.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('laratrust.permissions');
    $trail->push("Editor", route('laratrust.permissions.edit', ['permission']));
});

Breadcrumbs::for('unisharp.lfm.show', function (BreadcrumbTrail $trail) {
    $trail->parent('welcome:dash');
    $trail->push(trans('laravel-filemanager::lfm.title-page'), route('unisharp.lfm.show', []));
});

?>