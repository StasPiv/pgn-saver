<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 27.08.16
 * Time: 17:23
 */

namespace StasPiv\PgnSaver\Model;


class Pgn
{
    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var string
     */
    private $result = '';

    /**
     * @var string
     */
    private $pgnString;

    /**
     * @var bool
     */
    private $null = false;

    /**
     * @return string
     */
    public function getPgnString(): string
    {
        return $this->pgnString;
    }

    /**
     * @param string $pgnString
     * @return Pgn
     */
    public function setPgnString(string $pgnString): self
    {
        $this->pgnString = $pgnString;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isNull(): bool
    {
        return $this->null;
    }

    /**
     * @param boolean $null
     * @return Pgn
     */
    public function setNull(bool $null): self
    {
        $this->null = $null;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return Pgn
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return Pgn
     */
    public function addHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;

        if ($name == 'Result') {
            $this->setResult($value);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @param string $result
     * @return Pgn
     */
    public function setResult(string $result): self
    {
        $this->result = $result;

        return $this;
    }
}