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

use Symfony\Component\Form\FormInterface;

/**
 * Joke form handler interface
 */
interface JokeFormHandlerInterface
{
    /**
     * @param \Symfony\Component\Form\FormInterface $form
     *
     * @return void
     */
    public function handle(FormInterface $form): void;
}
