<?php

/**
 * @copyright Copyright 2011 Andrew Brown. All rights reserved.
 * @license GNU/GPL, see 'help/LICENSE.html'.
 */
?>
<tr>
<?php
// Turn off all error reporting
error_reporting(0);

  /*open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->test;

  // access collection
  $collection = $db->items;
  
  // execute query
  // retrieve all documents
  $item = $collection->find(); */
  
  include 'mongoconnect.php';

   // echo $item->count() . ' document(s) found. <br/>';  
  foreach ($item as $obj) {
  //echo" ";}
  $url1 = WebRouting::getLocationUrl().'/post/'.$obj['_id'].'/read'; 
  $url2 = WebRouting::getLocationUrl().'/post/'.$obj['_id'].'/edit'; 
  $url3 = WebRouting::getLocationUrl().'/post/'.$obj['_id'].'/delete'; 
echo "<td>"; echo $obj['_id']; echo "</td>";
    echo "<td>"; echo $obj['title']; echo " by " ; echo $obj['author']; echo "</td>"; 
	
 echo "<td>";
 echo  "<a href=".$url1.">"."Read</a>"." ";
 echo  "<a href=".$url2.">"."Edit</a>"." ";
 echo  "<a href=".$url3.">"."Delete</a>"." ";
 echo "</td>";
  
	

	
echo "</tr>";
}//end for each
	?>