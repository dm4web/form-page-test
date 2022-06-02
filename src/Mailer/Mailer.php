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

use Symfony\Component\Mailer\MailerInterface as BaseMailerInterface;
use Symfony\Component\Mime\Email;

/**
 * Mailer sender
 */
class Mailer implements MailerInterface
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var \Symfony\Component\Mailer\MailerInterface
     */
    private $mailer;

    public function __construct(string $from, BaseMailerInterface $mailer)
    {
        $this->from = $from;
        $this->mailer = $mailer;
    }

    /**
     * {@inheritDoc}
     */
    public function sendEmail(string $to, string $subject, string $text, string $from = null, string $html = null): void
    {
        $email = (new Email())
            ->from($from ?? $this->from)
            ->to($to)
            ->subject($subject)
            ->text($text);

        if (null !== $html) {
            $email->html($html);
        }

        $this->mailer->send($email);
    }
}
