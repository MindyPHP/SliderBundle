<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\SliderBundle\Library;

use Mindy\Template\Library;
use Mindy\Bundle\SliderBundle\Model\Slider;

class SliderLibrary extends Library
{
    /**
     * @return array
     */
    public function getHelpers()
    {
        return [
            'get_slides' => function ($group) {
                return Slider::objects()->filter(['group' => $group])->all();
            },
        ];
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return [];
    }
}
