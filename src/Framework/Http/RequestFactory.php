<?php

namespace Framework\Http;

use Framework\Http\Request;

class RequestFactory
{
    public static function fromGlobals(Array $query = null, Array $body = null): Request
    {
        return (new Request())
            ->withQueryParams($query ?: $_GET)
            ->withParsedBody($body ?: $_POST);
    }
}