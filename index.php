<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/hello/:name', function($name){
	echo "Hello, $name";
});

$app->get('/', function() use ($app){
	require_once 'lib/mysql.php';
	$db = connect_db();
	$result = $db->query( 'SELECT id, name, job FROM friends;' );
	while ( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
		$data[] = $row;
	}
	$app->render('friends.php', array(
			'page_title' => "Your Friends",
			'data' => $data
		)
	);

});


$app->run();