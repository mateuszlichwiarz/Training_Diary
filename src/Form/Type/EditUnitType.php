<?php

    namespace App\Form\Type;

    use App\Entity\User;
    use App\Entity\GeneralSettings;

    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\IntegerType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\CollectionType;

    use Symfony\Component\Form\FormBuilderInterface;


    class EditUnitType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
            ->add('weightUnit', ChoiceType::class, [
                'choices' => [
                    'lbs' => 'lbs',
                    'kg'  => 'kg',
                ],
                'attr' => ['class' => 'form-control'],
                'label' => false
                ]
            )
            ->add('save', SubmitType::class, array('label' => 'Save', 'attr' => array('class' => 'btn btn-success')))
            ;
        }
    }