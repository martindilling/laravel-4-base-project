<?php

View::composer('admin.layouts.master', function($view) {
    if (Auth::check()) {
        $view->with('current_user', Auth::user());
    }
});
