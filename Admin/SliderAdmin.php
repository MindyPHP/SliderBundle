<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\SliderBundle\Admin;

use Mindy\Bundle\AdminBundle\Admin\AbstractModelAdmin;
use Mindy\Bundle\SliderBundle\Form\SliderForm;
use Mindy\Bundle\SliderBundle\Model\Slider;

class SliderAdmin extends AbstractModelAdmin
{
    public $columns = ['name', 'group'];

    /**
     * @return string model class name
     */
    public function getModelClass()
    {
        return Slider::class;
    }

    public function getFormType()
    {
        return SliderForm::class;
    }
}
