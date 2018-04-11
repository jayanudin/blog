<?php

Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard / ', route('dashboard'));
});

// Home > Blog
Breadcrumbs::register('category', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(' Category ', route('category'));
});

Breadcrumbs::register('post', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(' Article', route('post'));
});

Breadcrumbs::register('tag', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(' Tags', route('tag'));
});

Breadcrumbs::register('comment', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(' Comments', route('comment'));
});