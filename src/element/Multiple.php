<?php


namespace zafarjonovich\ApplicationFiller\element;


class Multiple implements \Iterator
{
    protected $elements = [];

    public function __construct(array $elements = [])
    {
        foreach ($elements as $element) {
            $this->add($element);
        }

        $this->rewind();
    }

    public function add($element)
    {
        $this->elements[] = $element;
        return $this;
    }

    public function count()
    {
        return count($this->elements);
    }

    public function current()
    {
        if(!$this->valid())
            throw new \Exception('Not valid key: '.(static::class));

        $element = &$this->elements[$this->key()];
        return $element;
    }

    public function next()
    {
        next($this->elements);
    }

    public function key()
    {
        return key($this->elements);
    }

    public function valid()
    {
        return isset($this->elements[$this->key()]);
    }

    public function rewind()
    {
        reset($this->elements);
    }
}