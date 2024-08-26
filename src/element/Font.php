<?php


namespace zafarjonovich\ApplicationFiller\element;


use zafarjonovich\ApplicationFiller\ApplicationFiller;

class Font
{
    private $name;

    private $path;

    private $color;

    public function __construct($path, $size, $attributes = [])
    {
        
        if(!file_exists($path) || substr($path,-3) !== 'ttf')
            throw new \Exception('Font file doesn\'t exists or not found');
        
        $this->path = $path;
        $this->size = $size;
        if(isset($attributes['color'])) {
            $this->color = $attributes['color'];
        }
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }
}