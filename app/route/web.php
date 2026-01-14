<?php


rota('/', function () {
  view('home');
});

rota('/doc', function () {
  view('doc');
});

rota('/recursos', function () {
  view('recursos');
});

rota('/404', function () {
  view('404');
});