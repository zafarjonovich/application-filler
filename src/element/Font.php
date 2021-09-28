<?php


namespace zafarjonovich\ApplicationFiller\element;


use zafarjonovich\ApplicationFiller\ApplicationFiller;

class Font
{
    private $name;

    private $path;

    public function __construct($path,$size)
    {
        
        if(!file_exists($path) || substr($path,-3) !== 'ttf')
            throw new \Exception('Font file doesn\'t exists or not found');
        
        $this->path = $path;
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getPath()
    {
        return $this->path;
    }
}