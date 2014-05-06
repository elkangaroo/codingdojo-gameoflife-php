<?php

namespace CodingDojo;

class GameOfLife {

    const CELL_ALIVE = 1;
    const CELL_DEAD = 0;

    /**
     * @var array
     */
    private $board = array();

    /**
     * @param array $board
     */
    public function __construct(array $board)
    {
        $this->board = $board;
    }

    /**
     * @param int $state
     * @param int $numberOfAliveNeighbours
     * @return int
     */
    public function getCellStatusForNextGeneration($state, $numberOfAliveNeighbours)
    {
        if ($state == self::CELL_DEAD && $numberOfAliveNeighbours != 3) {
            return self::CELL_DEAD;
        }

        if ($numberOfAliveNeighbours == 2 || $numberOfAliveNeighbours == 3) {
            return self::CELL_ALIVE;
        }

        return self::CELL_DEAD;
    }

    /**
     * @param int $x
     * @param int $y
     * @return int
     */
    public function getNumberOfAliveNeighbours($x, $y)
    {
        $numberOfAliveNeighbours = 0;
        $numberOfAliveNeighbours += (int) $this->isLeftUpperNeighbourAlive($x, $y);
        $numberOfAliveNeighbours += (int) $this->isUpperNeighbourAlive($x, $y);
        $numberOfAliveNeighbours += (int) $this->isRightUpperNeighbourAlive($x, $y);
        $numberOfAliveNeighbours += (int) $this->isRightNeighbourAlive($x, $y);
        $numberOfAliveNeighbours += (int) $this->isRightLowerNeighbourAlive($x, $y);
        $numberOfAliveNeighbours += (int) $this->isLowerNeighbourAlive($x, $y);
        $numberOfAliveNeighbours += (int) $this->isLeftLowerNeighbourAlive($x, $y);
        $numberOfAliveNeighbours += (int) $this->isLeftNeighbourAlive($x, $y);

        return $numberOfAliveNeighbours;
    }

    public function isLeftUpperNeighbourAlive($x, $y)
    {
        if ($x == 0 || $y == 0) {
            return false;
        }
        return (bool) $this->board[$y - 1][$x - 1];
    }

    public function isUpperNeighbourAlive($x, $y)
    {
        if ($y == 0)
        {
            return false;
        }
        return (bool) $this->board[$y - 1][$x];
    }

    public function isRightUpperNeighbourAlive($x, $y)
    {
        if ($x == count($this->board) - 1 || $y == 0) {
            return false;
        }
        return (bool) $this->board[$y - 1][$x + 1];
    }

    public function isRightNeighbourAlive($x, $y)
    {
        if ($x == count($this->board) - 1) {
            return false;
        }
        return (bool) $this->board[$y][$x + 1];
    }

    public function isRightLowerNeighbourAlive($x, $y)
    {
        if ($x == count($this->board) - 1 || $y == count($this->board) - 1) {
            return false;
        }
        return (bool) $this->board[$y + 1][$x + 1];
    }

    public function isLowerNeighbourAlive($x, $y)
    {
        if ($y == count($this->board) - 1) {
            return false;
        }
        return (bool) $this->board[$y + 1][$x];
    }

    public function isLeftLowerNeighbourAlive($x, $y)
    {
        if ($x == 0 || $y == count($this->board)- 1) {
            return false;
        }
        return (bool) $this->board[$y + 1][$x - 1];
    }

    public function isLeftNeighbourAlive($x, $y)
    {
        if ($x == 0) {
            return false;
        }
        return (bool) $this->board[$y][$x - 1];
    }
}