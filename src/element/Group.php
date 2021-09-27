<?php


namespace zafarjonovich\ApplicationFiller\element;


class Group
{
    private $text;

    public $lines;

    /**
     * Group constructor.
     * @param Text $text
     * @param Lines $lines
     */
    public function __construct(Text $text,Lines $lines)
    {
        $this->text = $text;
        $this->lines = $lines;
    }

    /**
     * @return Text
     */
    public function text()
    {
        return $this->text;
    }

    /**
     * @return Lines
     */
    public function lines()
    {
        return $this->lines;
    }
}