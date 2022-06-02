<?php

declare(strict_types=1);

/**
 * @author    Daniil Molchanov <sadme28@gmail.com>
 * @copyright Copyright (c) 2022, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\Type;

use App\Form\Model\JokeFormModel;
use App\ICNDB\Repository\CategoryRepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Homepage form type
 */
class JokeFormType extends AbstractType
{
    /**
     * @var \App\ICNDB\Repository\CategoryRepositoryInterface
     */
    private $categoriesRepository;

    /**
     * @param \App\ICNDB\Repository\CategoryRepositoryInterface $categoriesRepository
     */
    public function __construct(CategoryRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('category', ChoiceType::class, [
                'choices'      => $this->categoriesRepository->getCategories(),
                'choice_label' => function ($choice) {
                    return $choice;
                },
            ])
            ->add('submit', SubmitType::class);
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JokeFormModel::class,
        ]);
    }
}
