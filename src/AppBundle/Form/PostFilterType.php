<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use Lexik\Bundle\FormFilterBundle\Filter\FilterOperands;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

/**
 * PostFilterType filtro.
 * @author Nombre Apellido <name@gmail.com>
 */
class PostFilterType extends AbstractType
{
        /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('booleano', Filters\BooleanFilterType::class)
            ->add('entero', Filters\NumberRangeFilterType::class)
            ->add('smallEntero', Filters\NumberRangeFilterType::class)
            ->add('bigEntero', Filters\NumberRangeFilterType::class)
            ->add('cadena', Filters\TextFilterType::class, [
                'condition_pattern' => FilterOperands::OPERAND_SELECTOR,
            ])
            ->add('texto', Filters\TextFilterType::class, [
                'condition_pattern' => FilterOperands::OPERAND_SELECTOR,
            ])
            ->add('fechatiempo', Filters\DateTimeRangeFilterType::class)
            ->add('fecha', Filters\DateRangeFilterType::class)
            ->add('tiempo', Filters\TextFilterType::class, [
                'condition_pattern' => FilterOperands::OPERAND_SELECTOR,
            ])
            ->add('numerodecimal', Filters\NumberRangeFilterType::class)
            ->add('numeroconcoma', Filters\NumberRangeFilterType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Post',
            'csrf_protection'   => false,
            'validation_groups' => ['filtering'] // avoid NotBlank() constraint-related message
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_postfiltertype';
    }


}
