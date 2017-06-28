<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('test2', function () {
    return view('pages/layout/test2');
});

Route::get('index2',  function () {
    return view('index2');
});

Route::get('top-nav',  function () {
    return view('pages/layout/top-nav');
});
// Route::get('pages/layout/top-nav',  function () {
//     return view('top-nav1');
// });

Route::get('boxed',  function () {
    return view('pages/layout/boxed');
});

Route::get('fixed',  function () {
    return view('pages/layout/fixed');
});

Route::get('collapsed-sidebar',  function () {
    return view('pages/layout/collapsed-sidebar');
});

Route::get('widgets',  function () {
    return view('pages/widgets');
});

Route::get('chartjs',  function () {
    return view('pages/charts/chartjs');
});

Route::get('morris',  function () {
    return view('pages/charts/morris');
});

Route::get('flot',  function () {
    return view('pages/charts/flot');
});

Route::get('inline',  function () {
    return view('pages/charts/inline');
});

Route::get('general',  function () {
    return view('pages/UI/general');
});

Route::get('icons',  function () {
    return view('pages/UI/icons');
});

Route::get('buttons',  function () {
    return view('pages/UI/buttons');
});

Route::get('sliders',  function () {
    return view('pages/UI/sliders');
});

Route::get('timeline',  function () {
    return view('pages/UI/timeline');
});

Route::get('modals',  function () {
    return view('pages/UI/modals');
});

Route::get('generalelements',  function () {
    return view('pages/forms/general');
});

Route::get('advanced',  function () {
    return view('pages/forms/advanced');
});

Route::get('editors',  function () {
    return view('pages/forms/editors');
});

Route::get('simple',  function () {
    return view('pages/tables/simple');
});

Route::get('data',  function () {
    return view('pages/tables/data');
});

Route::get('calendar',  function () {
    return view('pages/calendar');
});

Route::get('mailbox',  function () {
    return view('pages/mailbox/mailbox');
});
Route::get('compose',  function () {
    return view('pages/mailbox/compose');
});
Route::get('read-mail',  function () {
    return view('pages/mailbox/read-mail');
});

Route::get('invoice',  function () {
    return view('pages/examples/invoice');
});

Route::get('profile',  function () {
    return view('pages/examples/profile');
});

Route::get('login',  function () {
    return view('pages/examples/login');
});

Route::get('register',  function () {
    return view('pages/examples/register');
});

