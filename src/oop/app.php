<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 19.08.2020
 * Time: 0:11
 */

include_once('Request.php');

$request = new Request();

$requestAll = $request->all();
$requestSelected = $request->all(['one', 'two']);
$requestTestGet = $request->query('test', "It wasn't set");
$requestTestPost = $request->post('test', "It wasn't set?");
$requestTestQuery = $request->get('test', "There wasn't such key");
$requestHasTest = $request->has('test');
$ip = $request->ip();
$brouser = $request->userAgent();

$request->session->set('start', time());
$sessionStarted = $request->session->has('start');
$sessionMessage = $request->session->get('start', "Session isn't started");
$request->session->set('new', 'new data');
$request->session->clear();
$request->session->set('new', 'new data');
$request->session->remove('new');
$sessionVariables = $request->session->all();

$cookieCheck = $request->cookies->has('test');
$request->cookies->set('test', 'test');
$request->cookies->set('test1', 'test1');
$cookieTest = $request->cookies->get('test');
$request->cookies->remove('test1');
$cookiesAll = $request->cookies->all();
