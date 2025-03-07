<?php

declare(strict_types=1);

/*
 * This file is part of the zenstruck/foundry package.
 *
 * (c) Kevin Bond <kevinbond@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zenstruck\Foundry\PHPUnit;

use PHPUnit\Event;

/**
 * @internal
 * @author Nicolas PHILIPPE <nikophil@gmail.com>
 */
final class BootFoundryOnDataProviderMethodCalled implements Event\Test\DataProviderMethodCalledSubscriber
{
    public function notify(Event\Test\DataProviderMethodCalled $event): void
    {
        if (\method_exists($event->testMethod()->className(), '_bootForDataProvider')) {
            \call_user_func([$event->testMethod()->className(), '_bootForDataProvider']);
        }
    }
}
