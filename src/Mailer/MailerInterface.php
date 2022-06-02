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
 * MailerWrapper interface
 */
interface MailerInterface
{
    /**
     * @param string      $to
     * @param string      $subject
     * @param string      $text
     * @param string|null $from
     * @param string|null $html
     *
     * @return void
     */
    public function sendEmail(string $to, string $subject, string $text, string $from = null, string $html = null): void;
}
