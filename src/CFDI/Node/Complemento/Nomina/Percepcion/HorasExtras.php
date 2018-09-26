<?php

/*
 * This file is part of the CFDI project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Charles\CFDI\Node\Complemento\Nomina\Percepcion;

use Charles\CFDI\Common\Node;

/**
 * This is the Percepcion details class.
 *
 * @author Ethel Gonzalez <emmelaine.glz@gmail.com>
 */
 class HorasExtras extends Node
 {
     /**
      * Node name.
      *
      * @var string
      */
     protected $nodeName = 'nomina12:HorasExtra';


     /**
      * Extra Hours constructor.
      * @param array $data
      */
     public function __construct(array $data = [])
     {
         parent::__construct($data, $this->parentAttributes());
     }

     /**
      * Node attributes.
      *
      * @return array
      */
     public function parentAttributes()
     {
         return [];
     }
 }
