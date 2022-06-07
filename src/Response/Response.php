<?php
namespace VendingMachine\Response;

use VendingMachine\Response\ResponseInterface;

class Response implements ResponseInterface
{
    private string $response;

    public function __construct($input)
    {
        $this->response = $input;
    }

	public function __toString(): string {
        return $this->response;
    }
}