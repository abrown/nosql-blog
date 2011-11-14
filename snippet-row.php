<?php

/**
 * @copyright Copyright 2011 Andrew Brown. All rights reserved.
 * @license GNU/GPL, see 'help/LICENSE.html'.
 */
?>
<tr>
    <td><?php echo @$id; ?></td>
    <td><?php echo substr(@$item->title, 0, 50); ?>, by <?php echo substr(@$item->author, 0, 50); ?></td>
    <td>
        <a href="<?php echo WebRouting::createUrl('post/'.@$id.'/read'); ?>">Read</a>
        <a href="<?php echo WebRouting::createUrl('post/'.@$id.'/edit'); ?>">Edit</a>
        <a href="<?php echo WebRouting::createUrl('post/'.@$id.'/delete'); ?>">Delete</a>
    </td>
</tr>