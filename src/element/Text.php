<?php


namespace zafarjonovich\ApplicationFiller\element;

use Intervention\Image\Gd\Font as GDFont;


class Text
{
    public const ALIGNMENT_MODE_LEFT = 'ALIGNMENT_MODE_LEFT';
    public const ALIGNMENT_MODE_CENTER = 'ALIGNMENT_MODE_CENTER';
    public const ALIGNMENT_MODE_RIGHT = 'ALIGNMENT_MODE_RIGHT';
    public const ALIGNMENT_MODE_FILL = 'ALIGNMENT_MODE_FILL';

    public const TEXT_SEPARATOR = ' ';

    private $text;

    private $font;

    private $alignment = self::ALIGNMENT_MODE_LEFT;

    public function __construct($text,Font $font)
    {
        $this->text = $text;
        $this->font = $font;
    }

    public function getGDFont()
    {
        $font = new GDFont($this->text);
        $font->size($this->getSize());
        $font->file($this->getFont()->getPath());
        $font->valign('top');
        $font->align('left');

        return $font;
    }

    public function initLineText(Line $line,GDFont $font,array $lineParts)
    {
        if($this->alignmentIs(self::ALIGNMENT_MODE_LEFT)) {
            $this->font = implode(self::TEXT_SEPARATOR,$lineParts);
        } else if($this->alignmentIs(self::ALIGNMENT_MODE_CENTER)) {
            $this->font = implode(self::TEXT_SEPARATOR,$lineParts);
        } else if($this->alignmentIs(self::ALIGNMENT_MODE_RIGHT)) {
            $this->font = implode(self::TEXT_SEPARATOR,$lineParts);
        }
    }

    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;
        return $this;
    }

    public function getAlignment()
    {
        return $this->alignment;
    }

    public function alignmentIs($alignment)
    {
        return $this->getAlignment() == $alignment;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getFont()
    {
        return $this->font;
    }

    public function get()
    {
        return $this->text;
    }
}