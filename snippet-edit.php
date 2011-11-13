<?php
/**
 * @copyright Copyright 2011 Andrew Brown. All rights reserved.
 * @license GNU/GPL, see 'help/LICENSE.html'.
 */
if( !$service->id ) $action = WebRouting::getLocationUrl().'/post/*/create';
else $action = WebRouting::getLocationUrl().'/post/'.$service->id.'/update';
?>
<form action="<?php echo $action; ?>" method="post">
    <fieldset>
        <legend>Post</legend>
        <span class="field">
            <label for="post-id">ID</label>
            <span id="post-id"><?php echo @$id; ?></span>
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
            <input type="text" id="post-title" name="Post[title]" value="<?php echo @$data->title; ?>" />
        </span>
        <span class="field">
            <label for="post-content">Text</label> 
            <input type="text" id="post-content" name="Post[content]" value="<?php echo @$data->content; ?>" />
        </span>
        <span class="field">
            <label for="post-author">Author</label> 
            <input type="text" id="post-author" name="Post[author]" value="<?php echo @$data->author; ?>" />
        </span>
    </fieldset>
    <input type="submit" value="Save" />
</form>
<a href="<?php echo WebRouting::getLocationUrl().'/post/'.@$id.'/read'; ?>">Read</a>
<a href="<?php echo WebRouting::getLocationUrl().'/post/'.@$id.'/edit'; ?>">Edit</a>
<a href="<?php echo WebRouting::getLocationUrl().'/post/'.@$id.'/delete'; ?>">Delete</a>