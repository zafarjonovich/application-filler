<?php

namespace zafarjonovich\ApplicationFiller\helper;

use Intervention\Image\Gd\Font as GDFont;
use zafarjonovich\ApplicationFiller\ApplicationFiller;
use zafarjonovich\ApplicationFiller\element\CorrectedLine;
use zafarjonovich\ApplicationFiller\element\CorrectedLines;
use zafarjonovich\ApplicationFiller\element\Font;
use zafarjonovich\ApplicationFiller\element\Group;
use zafarjonovich\ApplicationFiller\element\Line;
use zafarjonovich\ApplicationFiller\element\Point;
use zafarjonovich\ApplicationFiller\element\Text;

class GroupTextAdder
{
    /**
     * @var CorrectedLines $lines
     */
    private $lines;

    /**
     * @var Group $group
     */
    private $group;

    public function __construct(CorrectedLines $lines,Group $group)
    {
        $this->lines = $lines;
        $this->group = $group;
    }

    public function initialize()
    {
        $group = $this->group;

        $parts = explode(CorrectedLines::TEXT_SEPARATOR,$group->text()->get());

        $lineParts = [];

        foreach ($parts as $part) {


            /**
             * @var Line $line
             */
            $line = $group->lines->current();

            $font = $group->text()->getGDFont();
            $tempFont = $group->text()->getGDFont();

            $lineTempText = implode(CorrectedLines::TEXT_SEPARATOR,array_merge($lineParts,[$part]));

            $tempFont->text = $lineTempText;

            $sizes = $tempFont->getBoxSize();

            $textWidth = $sizes['width'];

            if($textWidth > $line->length()) {

                Text::initLineText($line,$group->text(),$font,$lineParts);

                $this->addLine($line,$font);

                $group->lines->next();

                $lineParts = [];

            } else {
                $lineParts[] = $part;
            }
        }


        if(!empty($lineParts)) {
            Text::initLineText($line,$group->text(),$font,$lineParts);
            $this->addLine($group->lines->current(),$font);
        }
    }

    private function addLine(Line $line,GDFont $font)
    {
        $beforeHeight = $font->getBoxSize()['height'];

        $text = $font->text;

        $font->text = 'A';

        $height = $font->getBoxSize()['height'];

        $font->text = $text;

        $this->lines->add(
            new CorrectedLine(
                new Point(
                    $line->headPoint()->getX(),
                    $line->headPoint()->getY() + ($height - $beforeHeight)
                ),
                $font
            )
        );
    }
}