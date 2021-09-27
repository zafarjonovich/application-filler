<?php


namespace zafarjonovich\ApplicationFiller\element;


class Groups extends Multiple
{
    public function add($element)
    {
        if(!($element instanceof Group))
            throw new \Exception('Element must instance of '.(Group::class));
        return parent::add($element);
    }
}