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

class RawResult
{
    public array $headers = [];

    public null|string|Buffer $body = null;

    public string $protocolVersion = '';

    /** @var array<string, string> */
    public array $headerNames = [];

    public int $contentLength = 0;

    public bool $shouldKeepAlive = false;

    public bool $isUpgrade = false;

    /** @var RawUploadedFile[] */
    public array $uploadedFiles = [];
}
