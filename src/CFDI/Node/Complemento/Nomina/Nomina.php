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
 * This is the payroll class.
 *
 * @author Ethel Gonzalez <emmelaine.glz@gmail.com>
 */
class Nomina extends Node
{

    /**
     * Parent node name.
     *
     * @var string
     */
    protected $parentNodeName = 'cfdi:Complemento';
    /**
     * Node name.
     *
     * @var string
     */
    protected $nodeName = 'nomina12:Nomina';

    /**
     * Payroll constructor.
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
