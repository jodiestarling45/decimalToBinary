<?php

class queue
{
    public $queue;
    public $limit;
    public $count = -1;

    public function __construct($arr, $limit)
    {
        if (is_array($arr)) {
            $this->queue = $arr;
        } else {
            $this->queue = [];
        }
        if (is_integer($limit)) {
            $this->limit = $limit;
        } else {
            $this->limit = 10;
        }

    }

    public function dequeue()
    {
        array_shift($this->queue);
        $this->count--;
    }

    public function isEmpty()
    {
        return empty($this->queue);
    }

    public function enqueue($value)
    {
        if (count($this->queue) <= $this->limit) {
            array_push($this->queue, $value);
            $this->count++;
        } else {
            $this->dequeue();
            array_push($this->queue, $value);
            $this->count++;
        }
    }

    public function __toString()
    {
        return implode(',', $this->queue);
        // TODO: Implement __toString() method.
    }
}

$arr = [];
$limit = 1000;
$queue = new queue($arr,$limit);
$decimal = 50;
for ($i=0;$i<=$decimal;$i++){
    if ($i%2){
        $queue->enqueue($i);
    }else{
        continue;
    }
}
var_dump($queue);