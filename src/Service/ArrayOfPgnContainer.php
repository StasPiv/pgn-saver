<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 27.08.16
 * Time: 18:24
 */

namespace StasPiv\PgnSaver\Service;

use StasPiv\PgnSaver\Model\Pgn;

class ArrayOfPgnContainer implements ContainerInterface
{
    /**
     * @var array
     */
    private $pgnArray = [];

    /**
     * ArrayContainer constructor.
     * @param array $pgnArray
     */
    public function __construct(array $pgnArray)
    {
        $this->pgnArray = $pgnArray;
    }

    /**
     * @return Pgn
     */
    public function getNextPgn(): Pgn
    {
        $pgn = current($this->pgnArray);

        if (!$pgn) {
            return (new Pgn())->setNull(true);
        }

        next($this->pgnArray);

        return $pgn;
    }
}