<?php
/**
 * @copyright Copyright 2011 Andrew Brown. All rights reserved.
 * @license GNU/GPL, see 'help/LICENSE.html'.
 */
?>
<a href="<?php echo WebRouting::createUrl('post/*/edit'); ?>">New Post</a>
<table>
    <tr>
        <th>ID</th>
        <th>Post</th>
        <th> </th>
    </tr>
    <?php
    foreach($data as $id => $item){
        include('snippet-row.php');
    }
    ?>
</table>