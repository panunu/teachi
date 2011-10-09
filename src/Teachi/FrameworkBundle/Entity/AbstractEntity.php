<?php

namespace Teachi\FrameworkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teachi\MainBundle\Entity\AbstractEntity
 */
abstract class AbstractEntity
{   
    /**
     * Reflects get and set methods.
     * 
     * @param  type  $method
     * @param  array $parameters
     * @return AbstractEntity | $mixed
     */
    public function __call($method, array $parameters)
    {
        $propertyName = lcfirst(substr($method, 3));
        $accessor = substr($method, 0, 3);
        
        if(!in_array($accessor, array('get', 'set'))) {
            $propertyName = $method;
            $accessor = null;
        }
                        
        $class = new \ReflectionClass($this);
        $class = !strstr($class->getName(), 'Proxy') ?
            $class : $class->getParentClass();
                
        if(!$class->hasProperty($propertyName) || 
                $class->getProperty($propertyName)->isPrivate()) {
            throw new \Exception("No such property as {$propertyName} in {$class->getName()}");
        }
        
        $property = $class->getProperty($propertyName);
        $property->setAccessible(true);
        
        if(!$accessor || $accessor == 'get') {
            return $property->getValue($this);
        }
                
        $property->setValue($this, current($parameters));
        return $this;
    }
}