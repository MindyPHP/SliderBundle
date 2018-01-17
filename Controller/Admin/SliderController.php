<?php

declare(strict_types=1);

/*
 * Studio 107 (c) 2018 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\SliderBundle\Controller\Admin;

use Mindy\Bundle\MindyBundle\Controller\Controller;
use Mindy\Bundle\SliderBundle\Form\SliderForm;
use Mindy\Bundle\SliderBundle\Model\Slider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SliderController extends Controller
{
    public function list(Request $request)
    {
        $slides = Slider::objects()->all();

        return $this->render('admin/slider/slider/list.html', [
            'slides' => $slides,
        ]);
    }

    public function create(Request $request)
    {
        $slider = new Slider();

        $form = $this->createForm(SliderForm::class, $slider, [
            'method' => 'POST',
            'action' => $this->generateUrl('admin_rise_slider_slider_create'),
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (false === $slider->save()) {
                throw new \RuntimeException('Error while save menu');
            }

            $this->addFlash('success', 'Успешно сохранено');

            return $this->redirectToRoute('admin_rise_slider_slider_list');
        }

        return $this->render('admin/slider/slider/create.html', [
            'form' => $form->createView(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::objects()->get(['id' => $id]);
        if (null === $slider) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(SliderForm::class, $slider, [
            'method' => 'POST',
            'action' => $this->generateUrl('admin_rise_slider_slider_update', ['id' => $id]),
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (false === $slider->save()) {
                throw new \RuntimeException('Error while save menu');
            }

            $this->addFlash('success', 'Успешно сохранено');

            return $this->redirectToRoute('admin_rise_slider_slider_list');
        }

        return $this->render('admin/slider/slider/update.html', [
            'form' => $form->createView(),
            'slider' => $slider,
        ]);
    }

    public function remove(Request $request, int $id)
    {
        $slider = Slider::objects()->get(['id' => $id]);
        if (null === $slider) {
            throw new NotFoundHttpException();
        }

        if (false === $slider->delete()) {
            throw new \RuntimeException('Error while remove slide');
        }

        $this->addFlash('success', 'Успешно удалено');

        return $this->redirectToRoute('admin_rise_slider_slider_list');
    }
}
