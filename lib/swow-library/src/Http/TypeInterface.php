<?php
/**
 * This file is part of Swow
 *
 * @link    https://github.com/swow/swow
 * @contact twosee <twosee@php.net>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code
 */

declare(strict_types=1);

namespace Swow\Http;

interface TypeInterface
{
    public const TYPE_HTTP = 1 << 0;
    public const TYPE_WEBSOCKET = 1 << 1;
    public const TYPE_HTTP2 = 1 << 2;
}
