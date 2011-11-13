<?php

/**
 * @copyright Copyright 2011 Andrew Brown. All rights reserved.
 * @license GNU/GPL, see 'help/LICENSE.html'.
 */

?>
    <fieldset>
        <legend>Post</legend>
        <span class="field">
            <label for="post-id">ID</label>
            <span id="post-id"><?php echo @$data->id; ?></span>
        </span>
        <span class="field">
            <label for="post-created">Created On</label> 
            <span id="post-created"><?php echo @$data->created; ?></span>
        </span>
        <span class="field">
            <label for="post-modified">Last Modified On</label> 
            <span id="post-modified"><?php echo @$data->modified; ?></span>
        </span>
        <span class="field">
            <label for="post-title">Title</label> 
            <span id="post-title"><?php echo @$data->title; ?></span>
        </span>
        <span class="field">
            <label for="post-content">Content</label> 
            <span id="post-content"><?php echo @$data->content; ?></span>
        </span>
        <span class="field">
            <label for="post-author">Author</label> 
            <span id="post-author"><?php echo @$data->author; ?></span>
        </span>
    </fieldset>
    <a href="<?php echo WebRouting::createUrl('/post/'.@$id.'/read'); ?>">Read</a>
    <a href="<?php echo WebRouting::createUrl('/post/'.@$id.'/edit'); ?>">Edit</a>
    <a href="<?php echo WebRouting::createUrl('/post/'.@$id.'/delete'); ?>">Delete</a>