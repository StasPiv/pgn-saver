<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 27.08.16
 * Time: 18:10
 */

namespace StasPiv\PgnSaver\Service;

use StasPiv\PgnSaver\Model\Pgn;

class OneGameContainer implements ContainerInterface
{
    /**
     * @var Pgn
     */
    private $pgn;

    /**
     * OneGameContainer constructor.
     * @param Pgn $pgn
     */
    public function __construct(Pgn $pgn)
    {
        $this->pgn = $pgn;
    }

    public function getNextPgn(): Pgn
    {
        $pgn = clone $this->pgn;

        $this->pgn->setNull(true);

        return $pgn;
    }

}