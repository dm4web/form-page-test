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
 * Joke mailer interface
 */
interface JokeMailerInterface
{
    /**
     * @param string      $to
     * @param string      $category
     * @param string      $text
     * @param string|null $from
     * @param string|null $html
     *
     * @return void
     */
    public function sendEmail(string $to, string $category, string $text, string $from = null, string $html = null): void;
}
