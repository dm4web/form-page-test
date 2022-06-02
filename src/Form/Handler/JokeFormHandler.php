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

namespace App\Form\Handler;

use App\File\StorageInterface;
use App\ICNDB\Repository\JokeRepositoryInterface;
use App\Mailer\MailerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Joke form handler
 */
class JokeFormHandler implements JokeFormHandlerInterface
{
    private const FILE_DIR = '/files';

    private const FILENAME = 'joke.txt';

    /**
     * @var \App\Mailer\MailerInterface
     */
    private $mailer;

    /**
     * @var \App\ICNDB\Repository\JokeRepositoryInterface
     */
    private $jokeRepository;

    /**
     * @var \App\File\StorageInterface
     */
    private $fileSaver;

    /**
     * @param \App\Mailer\MailerInterface                   $mailer
     * @param \App\ICNDB\Repository\JokeRepositoryInterface $jokeRepository
     * @param \App\File\StorageInterface                    $fileSaver
     */
    public function __construct(
        MailerInterface $mailer,
        JokeRepositoryInterface $jokeRepository,
        StorageInterface $fileSaver
    ) {
        $this->mailer = $mailer;
        $this->jokeRepository = $jokeRepository;
        $this->fileSaver = $fileSaver;
    }

    /**
     * @param \Symfony\Component\Form\FormInterface $form
     *
     * @return void
     */
    public function handle(FormInterface $form): void
    {
        /** @var \App\Form\Model\JokeFormModel $formData */
        $formData = $form->getData();

        $joke = $this->jokeRepository->getJoke([
            'limitTo' => $formData->getCategory(),
        ]);

        $this->mailer->sendEmail(
            $formData->getEmail(),
            sprintf('Случайная шутка из "%s"', $formData->getCategory()),
            $joke->text
        );

        $this->fileSaver->saveToFile($joke->text . PHP_EOL, self::FILE_DIR, self::FILENAME);
    }
}
