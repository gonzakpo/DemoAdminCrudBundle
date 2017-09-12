<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use MWSimple\Bundle\AdminCrudBundle\Form\Type\ButtonDeleteType;

use MWSimple\Bundle\AdminCrudBundle\Form\Type\EmbedType;

class PostEmbedType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('booleano')->add('entero')->add('smallEntero')->add('bigEntero')->add('cadena')->add('texto')->add('fechatiempo')->add('fecha')->add('tiempo')->add('numerodecimal')->add('numeroconcoma')
            ->add('ButtonDelete', ButtonDeleteType::class, [
                'mapped' => false,
                'attr' => [
                    'col' => 'col-md-1',
                ],
            ])
            ->add('images', EmbedType::class, [
                'entry_type' => ImageType::class,
                'allow_add'   => true,
                'allow_delete' => true,
                'by_reference'  => false,
                'prototype_name' => '__nameembed__',
                'attr' => [
                    'class' => 'post_image__name__',
                    // 'class' => 'post_image',
                    'col'   => 'col-md-12',
                    // 'width' => "300",
                    // 'height' => "300"
                ],
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_post';
    }


}
