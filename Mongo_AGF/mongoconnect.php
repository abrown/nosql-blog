 <?php
 // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->test;

  // access collection
  $collection = $db->items;

  // execute query
  // retrieve all documents
  $data = $collection->find();
  
   // execute query
  // retrieve all documents
  $item = $collection->find();
  ?>
	