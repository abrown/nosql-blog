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
    echo 'author: ' . $obj['author'] . '<br/>';
    echo 'title: ' . $obj['title'] . '<br/>';
    echo 'content: ' . $obj['content'] . '<br/>';
	$content = "Author:" . $obj['author'];
	$content .= "Title:" . $obj['title'];
	$content .= "Content:" . $obj['content'];
	$wfile = 'db.txt';
	file_put_contents($wfile, $content);
    echo '<br/>';
  }

  // disconnect from server
  $conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
?>
