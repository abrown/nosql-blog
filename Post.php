<?php
class Post extends ServiceObjectItem{
    
    public function create($item = null){
        if( !is_null($item) ) $item->created = date('r');
        $id = parent::create($item);
        $url = WebRouting::getLocationUrl().'/post/'.$id.'?message=Item+updated+successfully';
        WebHttp::redirect($url);
        return $id;
    }
    
    public function update($item = null){
        if( !is_null($item) ) $item->modified = date('r');
        $item = parent::update($item);
        $url = WebRouting::getLocationUrl().'/post/'.$this->getID().'?message=Item+updated+successfully';
        WebHttp::redirect($url);
        return $item;
    }
    
    public function delete(){
        $item = parent::delete();
        $url = WebRouting::getLocationUrl().'/posts?message=Item+deleted+successfully';
        WebHttp::redirect($url);
        return $item;
    }
    
    
}