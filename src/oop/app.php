<?php
/**
 * Created by PhpStorm.
 * User: Shtuka
 * Date: 19.08.2020
 * Time: 0:11
 */

include_once('Request.php');

$_GET['test'] = 'Test';

$_POST['one'] = '1';
$_POST['two'] = '2';

$request = new Request();

$requestAll = $request->all();
$requestSelected = $request->all(['one', 'two']);
$requestTestGet = $request->query('test', "It wasn't set");
$requestTestPost = $request->post('test', "It wasn't set?");
$requestTestQuery = $request->get('test', "There wasn't such key");
$requestHasTest = $request->has('test');
$ip = $request->ip();
$brouser = $request->userAgent();

$request->cookies->set('test', 'test');
$request->cookies->set('test1', 'test1');
$cookieTest = $request->cookies->get('test');
$cookieCheck = $request->cookies->has('test');
$cookiesAll = $request->cookies->all();
$cookiesAllSelected = $request->cookies->all(['test1']);
$request->cookies->remove('test1');
$cookiesAllUpdated = $request->cookies->all();

$request->session->set('start', time());
$sessionStarted = $request->session->has('start');
$sessionMessage = $request->session->get('start', "Session isn't started");
$request->session->set('new', 'new data');
$request->session->set('new1', 'new data');
$sessionVariablesAfterClearing = $request->session->all(['new1']);
$request->session->remove('new1');
$checkDataDeleting = $request->session->get('new1', 'There is no data');
$sessionVariables = $request->session->all();
$request->session->clear();
$sessionVariablesAfterClearing = $request->session->all();