<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use MWSimple\Bundle\AdminCrudBundle\Form\Type\EmbedType;

class PageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('pageDate', \SC\DatetimepickerBundle\Form\Type\DatetimeType::class, [
                'pickerOptions' => [
                    'format'    => 'mm/dd/yyyy',
                    'startView' => 'month',
                    'minView'   => 'month',
                    'maxView'   => 'decade',
                    'todayBtn'  => true,
                ]
            ])
            ->add('active')
            ->add('posts', \Tetranz\Select2EntityBundle\Form\Type\Select2EntityType::class, [
                'multiple' => true,
                'remote_route' => 'Page_autocomplete_posts',
                'class' => 'AppBundle\Entity\Post',
                'minimum_input_length' => 0,
                'attr' => [
                    'class' => "col-lg-12 col-md-12 col-sm-12",
                    'col'   => "col-lg-12 col-md-12",
                ]
            ])
            ->add('postsEmbeds', EmbedType::class, [
                'entry_type' => PostEmbedType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'post_embed',
                    'col' => 'col-md-12',
                    'embed' => 'row',
                    'embed_row_col' => 'col-md-12',
                    'embed_row_style' => 'border-bottom: thin solid; margin: 10px 0px;',
                ],
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Page'
        ]);
    }
}
