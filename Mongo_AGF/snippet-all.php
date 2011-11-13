<?php
/**
 * @copyright Copyright 2011 Andrew Brown. All rights reserved.
 * @license GNU/GPL, see 'help/LICENSE.html'.
 */
?>
<a href="<?php echo WebRouting::getLocationUrl().'/post/*/edit'; ?>">New Post</a>
<table>
    <tr>
        <th>ID</th>
        <th>Post</th>
        <th> </th>
    </tr>
    <?php

 include 'mongoconnect.php';
    //foreach($data as $id => $item){
        include('snippet-row.php');
   // }
	
	
    ?>
</table>