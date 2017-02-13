<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Mindy\Bundle\SliderBundle\Model;

use Mindy\Orm\Fields\CharField;
use Mindy\Orm\Fields\ImageField;
use Mindy\Orm\Fields\TextField;
use Mindy\Orm\Model;

/**
 * Class Slider
 *
 * @property string $name
 * @property string|null $description
 * @property string $group
 * @property string|null $url
 * @property string $image
 */
class Slider extends Model
{
    public static function getFields()
    {
        return [
            'name' => [
                'class' => CharField::class,
            ],
            'description' => [
                'class' => TextField::class,
                'null' => true,
            ],
            'group' => [
                'class' => CharField::class,
            ],
            'image' => [
                'class' => ImageField::class,
            ],
            'url' => [
                'class' => CharField::class,
                'null' => true,
            ],
        ];
    }

    public function __toString()
    {
        return (string) $this->name;
    }
}
