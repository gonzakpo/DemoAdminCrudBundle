<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use MWSimple\Bundle\AdminCrudBundle\Form\Type\ButtonDeleteType;

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
