<?php 


class Container
{
    private $bindings = [];
    
    public function set(string $id, callable $factory): void
    {
        $this->bindings[$id] = $factory;
    }
    
    public function get(string $id)
    {
        if (! isset($this->bindings[$id])) {
            throw new Exception("Target binding [$id] does not exist.");
        }
        
        $factory = $this->bindings[$id];

        return $factory($this);
    }
}
?>