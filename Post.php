<?php
class Post extends ServiceObjectItem{
    public function last(){
        $this->getStorage()->begin();
        return $this->getStorage()->last();
    }
}