<?php


namespace zafarjonovich\ApplicationFiller\element;

use Intervention\Image\Gd\Font;

class CorrectedLine
{
    /**
     * @var Point $cordinate
     */
    private $cordinate;

    /**
     * @var Font $font
     */
    private $font;

    public function __construct(Point $cordinate,Font $font)
    {
        $this->cordinate = $cordinate;
        $this->font = $font;
    }

    public function getFont()
    {
        return $this->font;
    }

    public function getCordinate()
    {
        return $this->cordinate;
    }
}