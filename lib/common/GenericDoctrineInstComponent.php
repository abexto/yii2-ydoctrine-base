<?php

/*
 * Copyright (c) 2015, Andreas Prucha, Abexto - Helicon Software Development
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * *  Redistributions of source code must retain the above copyright notice, this 
 *    list of conditions and the following disclaimer.
 * *  Redistributions in binary form must reproduce the above copyright notice, 
 *    this list of conditions and the following disclaimer in the documentation 
 *    and/or other materials provided with the distribution.
 * *  Neither the name of Abexto, Helicon Software Development, Andreas Prucha
 *    nor the names of its contributors may 
 *    be used to endorse or promote products derived from this software without 
 *    specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
 * IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, 
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, 
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF 
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE 
 * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace abexto\ydc\base\common;

/**
 * Description of AbstractDoctrineDbConfigurableInstProperty
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class GenericDoctrineInstComponent extends AbstractDoctrineInstComponent
{
    /**
     * @var string  Fully qualified qualified class name for the doctrine property
     */
    public $doctrineClass = null;
    
    
    /**
     * @var array   Array of parameters passed to the constructor of the doctrine object 
     */
    public $constructorParams = [];
    
    /**
     * Array of additinal Values to assign
     * 
     * @var array   Associative array of property => value pairs
     */
    public $additional = [];
    
    /**
     * @return object
     */
    protected function newInst()
    {
        $class = new \ReflectionClass($this->doctrineClass);
        $result = $class->newInstanceArgs($this->constructorParams);
        return $result;
    }
    
    protected function configureInst($inst)
    {
        if (!empty($this->additional)) {
            $this->assignValuesToInst($inst, $this->additional);
        }
    }
    
}