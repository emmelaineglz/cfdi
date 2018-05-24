<?php

/*
 * This file is part of the CFDI project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Charles\CFDI\Node\Complemento\Nomina\OtrosPagos;

use Charles\CFDI\Common\Node;

/**
 * This is the Incapacidad Details class.
 *
 * @author Ethel Gonzalez <emmelaine.glz@gmail.com>
 */
 class OtrosPagos extends Node
 {
     /**
      * Node name.
      *
      * @var string
      */
     protected $parentNodeName = 'nomina12:OtrosPagos';

     /**
      * Node name.
      *
      * @var string
      */
     protected $nodeName = 'nomina12:OtroPago';

     /**
      * Deduccion Details constructor.
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
