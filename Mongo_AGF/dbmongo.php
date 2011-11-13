<?php
try {
  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->test;

  // access collection
  $collection = $db->items;

  // execute query
  // retrieve all documents
  $cursor = $collection->find();

  // iterate through the result set
  // print each document
  echo $cursor->count() . ' document(s) found. <br/>';  
  foreach ($cursor as $obj) {
    echo 'title: ' . $obj['title'] . '<br/>';
    echo 'author: ' . $obj['author'] . '<br/>';
    echo 'Content: ' . $obj['content'] . '<br/>';
	$title = $obj['title'];
	$author = $obj['author']
	$content = $obj['content']
    echo '<br/>';
  }


/*$wfile = fopen("db.mongo", "a");
fwrite($wfile, $title);
fwrite($wfile, $author);
fwrite($wfile, $content);
fopen($wfile);*/
/*
$content = $title;
$content .= $author;
$content .= $content;
$wfile = 'db.txt';
file_put_contents($wfile, $content);

*/


  // disconnect from server
  $conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}//end



?>
