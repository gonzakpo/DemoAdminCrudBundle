<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('booleano')
            ->add('entero')
            ->add('smallEntero')
            ->add('bigEntero')
            ->add('cadena')
            ->add('texto')
            ->add('fechatiempo', \SC\DatetimepickerBundle\Form\Type\DatetimeType::class, [
                'pickerOptions' => [
                    'format'    => 'mm/dd/yyyy hh:ii',
                    'startView' => 'month',
                    'minView'   => 'hour',
                    'maxView'   => 'decade',
                    'todayBtn'  => true,
                ]
            ])
            ->add('fecha', \SC\DatetimepickerBundle\Form\Type\DatetimeType::class, [
                'pickerOptions' => [
                    'format'    => 'mm/dd/yyyy',
                    'startView' => 'month',
                    'minView'   => 'month',
                    'maxView'   => 'decade',
                    'todayBtn'  => true,
                ]
            ])
            ->add('tiempo', \SC\DatetimepickerBundle\Form\Type\DatetimeType::class, [
                'pickerOptions' => [
                    'format'    => 'hh:ii',
                    'startView' => 'day',
                    'minView'   => 'hour',
                    'maxView'   => 'day',
                ]
            ])
            ->add('numerodecimal')
            ->add('numeroconcoma')
            ->add('page', \Tetranz\Select2EntityBundle\Form\Type\Select2EntityType::class, [
                'multiple' => false,
                'remote_route' => 'post_autocomplete_page',
                'class' => 'AppBundle\Entity\Page',
                'minimum_input_length' => 0,
                'attr' => [
                    'class' => "col-lg-12 col-md-12 col-sm-12",
                    'col'   => "col-lg-12 col-md-12",
                ]
            ])
            ->add('pageEmbed', \Tetranz\Select2EntityBundle\Form\Type\Select2EntityType::class, [
                'multiple' => false,
                'remote_route' => 'post_autocomplete_pageembed',
                'class' => 'AppBundle\Entity\Page',
                'minimum_input_length' => 0,
                'attr' => [
                    'class' => "col-lg-12 col-md-12 col-sm-12",
                    'col'   => "col-lg-12 col-md-12",
                ]
            ])
            ->add('images', \Tetranz\Select2EntityBundle\Form\Type\Select2EntityType::class, [
                'multiple' => true,
                'remote_route' => 'post_autocomplete_images',
                'class' => 'AppBundle\Entity\Image',
                'minimum_input_length' => 0,
                'attr' => [
                    'class' => "col-lg-12 col-md-12 col-sm-12",
                    'col'   => "col-lg-12 col-md-12",
                ]
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Post'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_post';
    }


}
