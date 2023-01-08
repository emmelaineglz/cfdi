<?php

/*
 * This file is part of the CFDI project.
 *
 * (c) Orlando Charles <me@orlandocharles.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Charles\CFDI\Node;

use Charles\CFDI\Common\Node;

/**
 * This is the comprobante class.
 *
 * @author Orlando Charles <me@orlandocharles.com>
 */
class Comprobante extends Node
{
    /**
     * CFDI version.
     *
     * @var string
     */
    protected $version;

    /**
     * CFDI version.
     *
     * @var boolean
     */
    protected $nomina;

    /**
     * Node name.
     *
     * @var string
     */
    protected $nodeName = 'cfdi:Comprobante';

    /**
     * Create a new comprobante instance.
     *
     * @param array   $data
     * @param string  $version
     */
    public function __construct($data)
    {
        $this->version = $data['Version'];
        $this->nomina = ($data['TipoDeComprobante'] === 'N') ? TRUE : FALSE;
        if ( $data['Version'] === '4.0') {
            $data = array_merge($this->attributes40(), $data);
        } else {
            $data = array_merge($this->attributes33(), $data);
        }
        parent::__construct($data);
    }

    /**
     * Node attributes.
     *
     * @return array
     */
    public function attributes33()
    {
        $schema = "http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd";
        if($this->nomina){ $schema .= " http://www.sat.gob.mx/nomina12 http://www.sat.gob.mx/sitio_internet/cfd/nomina/nomina12.xsd"; }
        $attribute = [
            'xmlns:cfdi' => 'http://www.sat.gob.mx/cfd/3',
            'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
            'xsi:schemaLocation' => $schema,
            'Version' => $this->version,
        ];
        if($this->nomina){ $attribute['xmlns:nomina12'] = "http://www.sat.gob.mx/nomina12"; }
        return $attribute;
    }
    
    /**
    * Node attributes.
    *
    * @return array
    */
   public function attributes40()
   {
       $schema = "http://www.sat.gob.mx/cfd/4 http://www.sat.gob.mx/sitio_internet/cfd/4/cfdv40.xsd";
       if($this->nomina){ $schema .= " http://www.sat.gob.mx/nomina12 http://www.sat.gob.mx/sitio_internet/cfd/nomina/nomina12.xsd"; }
       $attribute = [
           'xmlns:cfdi' => 'http://www.sat.gob.mx/cfd/4',
           'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
           'xsi:schemaLocation' => $schema,
           'Version' => $this->version,
       ];
       if($this->nomina){ $attribute['xmlns:nomina12'] = "http://www.sat.gob.mx/nomina12"; }
       return $attribute;
   }
}
