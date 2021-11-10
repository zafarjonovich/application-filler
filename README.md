# Application filler

Assalomu aleykum, this package helps to you fill applications wia php

## For example

You have application likely this

![Application form](https://serving.photos.photobox.com/74980064c73624b0ad3c29f938b4ac78abb3f5235f22b5d30a8692c10f039ff63a424d0c.jpg)

You must fill it programmatically

- Always the coordinate head is at the top left and the coordinates are measured in pixels
- Each text is grouped together and the group consists of rows that can be written
- Each group can be given different fonts, and it merges into a font object. The font object covers the absolute location of the font and the size of the text
- Each row consists of lines, and the lines consist of starting and ending points
- Each point is equal to the number of vertical and horizontal pixels counted from the origin

I suggest the following [site](https://yangcha.github.io/iview/iview.html) to calculate the coordinates


```php

require_once 'vendor/autoload.php';

use zafarjonovich\ApplicationFiller\element\Font;
use zafarjonovich\ApplicationFiller\element\Group;
use zafarjonovich\ApplicationFiller\element\Groups;
use zafarjonovich\ApplicationFiller\element\Line;
use zafarjonovich\ApplicationFiller\element\Lines;
use zafarjonovich\ApplicationFiller\element\Point;
use zafarjonovich\ApplicationFiller\element\Text;
use zafarjonovich\ApplicationFiller\ApplicationFiller;

try {
    $groups = new Groups();

    $groups->add(
        new Group(
            new Text('x',new Font('ubuntu.ttf',18)),
            (new Lines())
                ->add(
                    new Line(new Point(493,127),new Point(510,127))
                )
        )
    );

    $groups->add(
        new Group(
            new Text('English, Russian, Uzbek',new Font('ubuntu.ttf',16)),
            (new Lines())
                ->add(
                    new Line(new Point(280,196),new Point(640,196))
                )
        )
    );

    $groups->add(
        new Group(
            new Text('x',new Font('ubuntu.ttf',18)),
            (new Lines())
                ->add(
                    new Line(new Point(548,265),new Point(650,265))
                )
        )
    );

    $groups->add(
        new Group(
            new Text('x',new Font('ubuntu.ttf',18)),
            (new Lines())
                ->add(
                    new Line(new Point(548,265),new Point(650,265))
                )
        )
    );

    $groups->add(
        new Group(
            new Text('x',new Font('ubuntu.ttf',18)),
            (new Lines())
                ->add(
                    new Line(new Point(548,335),new Point(650,335))
                )
        )
    );

    $groups->add(
        new Group(
            new Text('x',new Font('ubuntu.ttf',18)),
            (new Lines())
                ->add(
                    new Line(new Point(490,402),new Point(510,402))
                )
        )
    );

    $largeText = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

    $groups->add(
        new Group(
            new Text($largeText,new Font('ubuntu.ttf',12)),
            (new Lines())
                ->add(
                    new Line(new Point(120,558),new Point(650,558))
                )
                ->add(
                    new Line(new Point(120,608),new Point(650,608))
                )
                ->add(
                    new Line(new Point(120,665),new Point(650,665))
                )
                ->add(
                    new Line(new Point(120,715),new Point(650,715))
                )
                ->add(
                    new Line(new Point(120,770),new Point(650,770))
                )
                ->add(
                    new Line(new Point(120,820),new Point(650,820))
                )
        )
    );

    $filler = new ApplicationFiller('application-form.jpg',$groups);

    $filler->draw();

    $filler->image->save('temp.jpg');

} catch (Exception $exception) {
    echo $exception->getMessage();
}

```

Result: 

![Result application form](https://serving.photos.photobox.com/2830967284b9941259d165c0a1c10c32f15f266f3bd9264108588424f25da2513cddca28.jpg)


You can change the text alignment

```php

$text = new Text("Hello world !",new Font('ubuntu.ttf',12));
$text->setAlignment(Text::ALIGNMENT_MODE_CENTER);

$groups->add(
    new Group(
        $text,
        (new Lines())
            ->add(
                new Line(new Point(490,402),new Point(510,402))
            )
    )
);
```