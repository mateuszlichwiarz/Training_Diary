<?php
    
    namespace App\Form\Type;
    
    use App\Entity\ProgramTrening;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\CollectionType;

    use Symfony\Component\Form\FormBuilderInterface;

    class NewType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
            ->add('name', textType::class, [
                    'attr' => ['class' => 'form-control'],
                    'label' => false
                    ],
            )
            ->add('exercises',  CollectionType::class, [
                'label' => false,
                'entry_type' => TextType::class,
                'entry_options' => [
                    'attr' => ['class' => 'form-control'],
                    'label' => false
                ],
                'allow_add' => true,
                'allow_delete' => true,
            ])
            ->add('save', SubmitType::class, array('label' => 'create', 'attr' => array('class' => 'btn btn-success')))
            ;
        }
    }