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

namespace App\Mailer;

/**
 * Joke mailer
 */
class JokeMailer implements JokeMailerInterface
{
    /**
     * @var \App\Mailer\MailerInterface
     */
    private $mailer;

    /**
     * @param \App\Mailer\MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @inheritDoc
     */
    public function sendEmail(string $to, string $category, string $text, string $from = null, string $html = null): void
    {
        $subject = sprintf('Случайная шутка из "%s"', $category);

        $this->mailer->sendEmail($to, $subject, $text, $from, $html);
    }
}
