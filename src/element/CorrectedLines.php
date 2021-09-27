<?php


namespace zafarjonovich\ApplicationFiller\element;


use zafarjonovich\ApplicationFiller\element\Groups;
use zafarjonovich\ApplicationFiller\element\Multiple;
use Intervention\Image\Gd\Font as GDFont;
use zafarjonovich\ApplicationFiller\element\Font;
use zafarjonovich\ApplicationFiller\helper\GroupTextAdder;

class CorrectedLines extends Multiple
{
    public const TEXT_SEPARATOR = ' ';

    public function __construct(Groups $groups)
    {
        /**
         * @var Group $group
         */
        foreach ($groups as $group) {
            $adder = new GroupTextAdder($this,$group);
            $adder->initialize();
        }
    }
}