<?php


namespace zafarjonovich\ApplicationFiller\element;


class Point
{
    /**
     * X coordinate
     *
     * @var int
     */
    private $x;

    /**
     * Y coordinate
     *
     * @var int
     */
    private $y;

    /**
     * Creates a new instance
     *
     * @param int $x
     * @param int $y
     */
    public function __construct($x = null, $y = null)
    {
        $this->x = is_numeric($x) ? intval($x) : 0;
        $this->y = is_numeric($y) ? intval($y) : 0;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    /**
     * Sets X coordinate
     *
     * @param int $x
     */
    public function setX($x)
    {
        $this->x = intval($x);
    }

    /**
     * Sets Y coordinate
     *
     * @param int $y
     */
    public function setY($y)
    {
        $this->y = intval($y);
    }

    /**
     * Sets both X and Y coordinate
     *
     * @param int $x
     * @param int $y
     */
    public function setPosition($x, $y)
    {
        $this->setX($x);
        $this->setY($y);
    }
}