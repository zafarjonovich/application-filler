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
        $font->size($this->font->getSize());
        $font->file($this->getFont()->getPath());
        $font->valign('top');
        $font->align('left');

        return $font;
    }

    public static function initLineText(Line $lineText,Text $text,GDFont $gdFont,array $lineParts)
    {
        if($text->alignmentIs(self::ALIGNMENT_MODE_LEFT)) {
            $gdFont->text = implode(self::TEXT_SEPARATOR,$lineParts);
        } else if($text->alignmentIs(self::ALIGNMENT_MODE_CENTER)) {
            $gdFont->text = ' ';

            $charWidth = $gdFont->getBoxSize()['width'];

            $text = implode(self::TEXT_SEPARATOR,$lineParts);

            $gdFont->text = $text;

            $freeWidth = $lineText->length() - $gdFont->getBoxSize()['width'];

            $count = round($freeWidth / $charWidth / 2);

            $gdFont->text = str_repeat(' ',$count).$text;
        } else if($text->alignmentIs(self::ALIGNMENT_MODE_RIGHT)) {
            $gdFont->text = ' ';

            $charWidth = $gdFont->getBoxSize()['width'];

            $text = implode(self::TEXT_SEPARATOR,$lineParts);

            $gdFont->text = $text;

            $freeWidth = $lineText->length() - $gdFont->getBoxSize()['width'];

            $count = round($freeWidth / $charWidth);

            $gdFont->text = str_repeat(' ',$count).$text;
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

    public function getFont()
    {
        return $this->font;
    }

    public function get()
    {
        return $this->text;
    }
}