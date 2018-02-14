<?php

/*
 * This file is part of the CFDI project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Charles\CFDI\Node\Complemento\Nomina;

use Charles\CFDI\Common\Node;

/**
 * This is the emisor class.
 *
 * @author Ethel Gonzalez <emmelaine.glz@gmail.com>
 */
 class Emisor extends Node
 {
     /**
      * Node name.
      *
      * @var string
      */
     protected $nodeName = 'nomina12:Emisor';

     /**
      * Emisor constructor.
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
