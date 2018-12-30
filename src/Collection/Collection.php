<?php

namespace App\Collection;

use App\DataMapper\Mapper;

abstract class Collection implements \Iterator
{
    protected $totalCount;
    protected $currentIndex = 0;
    protected $raw = [];
    protected $objects = [];
    protected $mapper;

    /**
     * Collection constructor.
     * @param array $raw
     * @param Mapper $mapper
     */
    public function __construct(array $raw, Mapper $mapper)
    {
        $this->raw = $raw;
        $this->totalCount = count($raw);
        $this->mapper = $mapper;
    }

    /**
     * @return string
     */
    abstract function getTargetClass(): string;

    /**
     * @param $object
     * @throws \Exception
     */
    public function add($object)
    {
        $class = $this->getTargetClass();
        if (!$object instanceof $class) {
            throw new \Exception(sprintf('Wrong class %s', get_class($object)));
        }

        $this->objects[$this->totalCount] = $object;
        $this->totalCount++;
    }

    /**
     * @param int $id
     * @return mixed|null
     * @throws \Exception
     */
    public function getRow(int $id)
    {
        if ($id < 0 || $id > $this->totalCount) {
            return null;
        }

        if (isset($this->objects[$id])) {
            return $this->objects[$id];
        }

        if (isset($this->raw[$id])) {
            $object = $this->mapper->createObject($this->raw[$id]);
            return $object;
        }

        return null;
    }

    /**
     * @return mixed|null
     * @throws \Exception
     */
    public function current()
    {
        return $this->getRow($this->currentIndex);
    }

    /**
     * @throws \Exception
     */
    public function next()
    {
        if ($this->valid()) {
            $this->currentIndex++;
        }
    }

    public function key()
    {
        return $this->currentIndex;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function valid()
    {
        return ( !is_null($this->current()));
    }

    public function rewind()
    {
        $this->currentIndex = 0;
    }
}
