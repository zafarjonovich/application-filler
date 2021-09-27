<?php


namespace zafarjonovich\ApplicationFiller\element;


use zafarjonovich\ApplicationFiller\ApplicationFiller;

class Font
{
    private $name;

    private $size;

    public function __construct($name,$size)
    {
        $this->name = $name;
        $this->size = $size;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getPath()
    {
        return ApplicationFiller::MAIN_DIR.'/font/'.$this->getName().'.ttf';
    }
}