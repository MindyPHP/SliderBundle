<?php
/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\SliderBundle\Form;

use Mindy\Bundle\AdminBundle\Form\Type\ButtonsType;
use Mindy\Bundle\FormBundle\Form\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Mindy\Bundle\SliderBundle\Model\Slider;
use Symfony\Component\Validator\Constraints as Assert;

class SliderForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Название'
            ])
            ->add('description', TextType::class, [
                'label' => 'Описание',
                'required' => false,
            ])
            ->add('image', FileType::class, [
                'label' => 'Изображение',
                'required' => false,
                'constraints' => [
                    new Assert\Image([
                        'maxHeight' => 1280,
                        'maxWidth' => 1920,
                        'minHeight' => 100,
                        'minWidth' => 100,
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ]
                    ])
                ]
            ])
            ->add('group', TextType::class, [
                'label' => 'Группа'
            ])
            ->add('url', TextType::class, [
                'label' => 'Ссылка',
                'required' => false,
            ])
            ->add('buttons', ButtonsType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Slider::class
        ]);
    }

}