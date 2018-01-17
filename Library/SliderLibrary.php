<?php

declare(strict_types=1);

/*
 * Studio 107 (c) 2018 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\SliderBundle\Library;

use Mindy\Bundle\SliderBundle\Model\Slider;
use Mindy\Template\Library\AbstractLibrary;

class SliderLibrary extends AbstractLibrary
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
            'get_slide_random' => function ($group) {
                return Slider::objects()->limit(1)->offset(0)
                    ->order(['?'])->get(['group' => $group]);
            },
        ];
    }
}
