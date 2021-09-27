<?php


namespace zafarjonovich\ApplicationFiller\element;


class Line
{
    private $headPoint;

    private $endPoint;

    private $text;

    public function __construct(Point $headPoint,Point $endPoint)
    {
        $this->headPoint = $headPoint;
        $this->endPoint = $endPoint;
    }

    public function length()
    {
        return sqrt(
            pow($this->headPoint->getY() - $this->endPoint->getY(),2) +
            pow($this->headPoint->getX() - $this->endPoint->getX(),2)
        );
    }

    public function headPoint()
    {
        return $this->headPoint;
    }

    public function endPoint()
    {
        return $this->endPoint;
    }

    public function setText(Text $text)
    {
        $this->text = $text;
        return $this;
    }
}