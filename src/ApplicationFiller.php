<?php


namespace zafarjonovich\ApplicationFiller;


use Intervention\Image\Gd\Font;
use zafarjonovich\ApplicationFiller\element\CorrectedLine;
use zafarjonovich\ApplicationFiller\element\CorrectedLines;
use zafarjonovich\ApplicationFiller\element\Groups;
use Intervention\Image\ImageManager;

class ApplicationFiller
{
    public $image;

    private $groups;

    public const MAIN_DIR = __DIR__;

    public function __construct($imagePath,Groups $groups)
    {
        $manager = new ImageManager(array('driver' => 'gd'));

        $this->image = $manager->make($imagePath);

        $this->groups = $groups;
    }

    public function draw()
    {
        $lines = new CorrectedLines($this->groups);

        /**
         * @var CorrectedLine $line
         */
        foreach ($lines as $line) {
            $this->image->text($line->getFont()->text, $line->getCordinate()->getX(),$line->getCordinate()->getY(), function(Font &$font) use($line){
                $font = clone $line->getFont();
            });
        }
    }
}