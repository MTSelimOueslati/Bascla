<?php

namespace basclaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')->add('date')->add('heurDeb')->add('heureFin')->add('description')->add( 'type' , ChoiceType::class, [
            'label' => '',
            'choices' => [
                'Touristic Tour' => 'Touristic Tour',
                'Competition' => 'Competition',

            ]])->add('pic' , FileType::class ,  array(
                'data_class' => null
            )
        )->add('capacite')->add( 'lieu' , ChoiceType::class, [
            'label' => 'Lieu',
            'choices' => [
                'La Marsa' => 'La Marsa',
                'Lac 2' => 'Lac 2',
                'El Menzah' => 'El Menzah',


            ]])
        ->add('save', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'basclaBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'basclabundle_event';
    }


}
