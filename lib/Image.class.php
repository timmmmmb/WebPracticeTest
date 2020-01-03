<?php
require_once 'lib/Apartment.class.php';

class Image {
    private $descriptions = [];
    private $images = [];
    public function __construct($apartment) {
        $this->descriptions = $apartment->getImageDescriptions();
        $this->images = $apartment->getImages();
    }

    public function render() {
        $result = "";
        for($i = 0; $i<sizeof($this->images); $i++){
            $result = $result.'<img src="assets/images/'.$this->images[$i].'" alt="'.$this->descriptions[$i].'"title="'.$this->descriptions[$i].'">';
        }
        return $result;
    }
}