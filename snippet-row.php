<?php

/**
 * @copyright Copyright 2011 Andrew Brown. All rights reserved.
 * @license GNU/GPL, see 'help/LICENSE.html'.
 */
?>
<tr>
    <td><?php echo @$id; ?></td>
    <td><?php echo @$item->title; ?>, by <?php echo @$item->author; ?></td>
    <td>
        <a href="<?php echo WebRouting::getLocationUrl().'/post/'.@$id.'/read'; ?>">Read</a>
        <a href="<?php echo WebRouting::getLocationUrl().'/post/'.@$id.'/edit'; ?>">Edit</a>
        <a href="<?php echo WebRouting::getLocationUrl().'/post/'.@$id.'/delete'; ?>">Delete</a>
    </td>
</tr>