<?php
class Post extends ServiceObjectItem{
    
    public function create($item = null){
        if( !is_null($item) ) $item->created = date('Y-m-d H:i:s');
        $id = parent::create($item);
        // redirect
        $_GET['message'] = 'Item created successfully';
        $url = WebRouting::createUrl('posts');
        WebHttp::redirect($url);
        // return
        return $id;
    }
    
    public function update($item = null){
        if( !is_null($item) ) $item->modified = date('c');
        $item = parent::update($item);
        // redirect
        $_GET['message'] = 'Item updated successfully';
        $url = WebRouting::createUrl('post/'.$this->getID());
        WebHttp::redirect($url);
        // return
        return $item;
    }
    
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