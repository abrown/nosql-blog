<?php
/**
 * Blog Posts
 */
class Post extends ServiceObjectItem{
    
    /**
     * Creates records
     * @param stdClass $item
     * @return int 
     */
    public function create($item = null){
        // add times
        if( !is_null($item) ) $item->created = date('Y-m-d H:i:s');
        // clean XSS
        $item = WebHttp::clean($item, 'html');
        // create new item
        $id = parent::create($item);
        // redirect
        $_GET['message'] = 'Item created successfully';
        $url = WebRouting::createUrl('posts');
        WebHttp::redirect($url);
        // return
        return $id;
    }
    
    /**
     * Updates records
     * @param stdClass $item
     * @return stdClass 
     */
    public function update($item = null){
        // add times
        if( !is_null($item) ) $item->modified = date('c');
        // clean XSS
        $item = WebHttp::clean($item, 'html');
        // update item
        $item = parent::update($item);
        // redirect
        $_GET['message'] = 'Item updated successfully';
        $url = WebRouting::createUrl('post/'.$this->getID());
        WebHttp::redirect($url);
        // return
        return $item;
    }
    
    /**
     * Deletes records
     * @return stdClass 
     */
    public function delete(){
        $item = parent::delete();
        // redirect
        $_GET['message'] = 'Item deleted successfully';
        $url = WebRouting::createUrl('posts');
        WebHttp::redirect($url);
        // return
        return $item;
    }
    
    
}