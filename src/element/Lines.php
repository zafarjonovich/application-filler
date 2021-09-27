<?php


namespace zafarjonovich\ApplicationFiller\element;


class Lines extends Multiple
{
    /**
     * @param $element
     * @return Lines
     * @throws \Exception
     */
    public function add($element)
    {
        if(!($element instanceof Line))
            throw new \Exception('Element must instance of '.(Line::class));

        return parent::add($element);
    }
}