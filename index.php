<?php
include 'vendor/autoload.php';

use Charles\CFDI\CFDI;
use Charles\CFDI\Node\Emisor;
use Charles\CFDI\Node\Receptor;
use Charles\CFDI\Node\Concepto;
use Charles\CFDI\Node\Complemento\Nomina\Nomina;
use Charles\CFDI\Node\Complemento\Nomina\EmisorN;
use Charles\CFDI\Node\Complemento\Nomina\ReceptorN;
use Charles\CFDI\Node\Complemento\Nomina\Deduccion\Deduccion;
use Charles\CFDI\Node\Complemento\Nomina\Percepcion\Percepcion;
use Charles\CFDI\Node\Complemento\Nomina\Incapacidad\Incapacidad;
use Charles\CFDI\Node\Complemento\Nomina\OtrosPagos\OtrosPagos;
use Charles\CFDI\Node\Complemento\Nomina\OtrosPagos\SubsidioAlEmpleo;
use Charles\CFDI\Node\Complemento\Nomina\OtrosPagos\CompensacionSaldosAFavor;
use Charles\CFDI\Node\Complemento\Nomina\Deduccion\DetalleDeduccion;
use Charles\CFDI\Node\Complemento\Nomina\Percepcion\DetallePercepcion;
use Charles\CFDI\Node\Complemento\Nomina\Percepcion\HorasExtras;

  $cer = file_get_contents('../uploads/moot9104055s8.cer.pem');
  $key = file_get_contents('../uploads/moot9104055s8.key.pem');

  $cfdi = new CFDI([
      'Serie' => 'A',
      'Folio' => 'A0101',
      'Fecha' => '2017-06-17T03:00:00',
      'FormaPago' => '01',
      'NoCertificado' => '00000000000000000000',
      'CondicionesDePago' => '',
      'Subtotal' => '',
      'Descuento' => '0.00',
      'Moneda' => 'MXN',
      'TipoCambio' => '1.0',
      'Total' => '5550.56',
      'TipoDeComprobante' => 'N',
      'MetodoPago' => 'PUE',
      'LugarExpedicion' => '64000',
  ], $cer, $key);

  $cfdi->add(new Emisor([
    "Rfc" => "ILD041028IT1",
    "Nombre" => "INNOVACION EN LOGISTICA Y DISTRIBUCION, SA DE CV",
    "RegimenFiscal" => "601"
  ]));

  $cfdi->add(new Receptor([
    "Rfc" => "ROPJ911121F83",
    "Nombre" => "RODRIGUEZ PINTO JUANA CORINA",
    "UsoCFDI" => "P01"
  ]));

  $cfdi->add(new Concepto([
    'ClaveProdServ' => '84111505',
    'Cantidad' => '1',
    'ClaveUnidad' => 'ACT',
    'Unidad' => 'Pieza',
    'Descripcion' => 'Pago de nómina',
    'ValorUnitario' => '11499.90',
    'Importe' => '11499.90',
    'Descuento' => '2147.91',
  ]));

  $nomina = new Nomina([
    'Version' => '1.2',
    'TipoNomina' => '0',
    'FechaPago' => '2018-01-15T12:00:00',
    'FechaInicialPago' => '2018-01-01T12:00:00',
    'FechaFinalPago' => '2018-01-15T12:00:00',
    'NumDiasPagados' => '15.000',
    'TotalPercepciones' => '7999.95',
    'TotalDeducciones' => '1294.72',
    'TotalOtrosPagos' => '0'
  ]);

  $nomina->add(new EmisorN([
    'RegistroPatronal' => 'Y5844311109'
  ]));

  $nomina->add(new ReceptorN([
    'Curp' => 'DORF730530HMCMMR02',
    'NumSeguridadSocial' => '94917301676',
    'FechaInicioRelLaboral' => '2011-07-29',
    'Antigüedad' => 'P337W',
    'TipoContrato' => '01',
    'TipoJornada' => '01',
    'TipoRegimen' => '02',
    'NumEmpleado' => '002579',
    'Puesto' => 'CHOFER EJECUTIVO',
    'RiesgoPuesto' => '4',
    'PeriodicidadPago' => '04',
    'SalarioBaseCotApor' => '591.56',
    'SalarioDiarioIntegrado' => '591.56',
    'ClaveEntFed' => 'DIF'
  ]));
  $nomina->add(new Deduccion([
    'TotalOtrasDeducciones' => '232.66',
    'TotalImpuestosRetenidos' => '1062.06'
  ]));

  $nomina->add(new DetalleDeduccion([
    'TipoDeduccion' => '001',
    'Clave' => '022',
    'Concepto' => 'SEGURIDAD SOCIAL',
    'Importe' => '232.66'
  ]));

  $nomina->add(new DetalleDeduccion([
    'TipoDeduccion' => '002',
    'Clave' => '021',
    'Concepto' => 'ISR',
    'Importe' => '1062.06'
  ]));

  $nomina->add(new Percepcion([
    'TotalSueldos' => '7999.95',
    'TotalGravado' => '7999.95',
    'TotalExento' => '0.00'
  ]));

  $detallePercepcion = new DetallePercepcion([
    'TipoPercepcion' => '019',
    'Clave' => 'P019',
    'Concepto' => 'TIEMPO EXTRA DOBLE',
    'ImporteGravado' => '0.00',
    'ImporteExento' => '225.00'
  ]);
  $detallePercepcion->add(new HorasExtras([
    'Dias' => '2',
    'TipoHoras' => '01',
    'HorasExtra' => '6',
    'ImportePagado' => '225'
  ]));

  $nomina->add(new Incapacidad([
    'DiasIncapacidad' => '2',
    'TipoIncapacidad' => '01',
    'ImporteMonetario' => '1200.50',
  ]));

  $oPagos =new OtrosPagos([
    'TipoOtroPago' => '002',
    'Clave' => 'P600',
    'Concepto' => 'SUBSIDIO AL EMPLEO',
    'Importe' => '188.70'
  ]);

  $oPagos->add(new SubsidioAlEmpleo([
    'SubsidioCausado' => '188.70'
  ]));

  $oPagos->add(new CompensacionSaldosAFavor([
    'SaldoAFavor' => '1.5',
    'Año' => '2018',
    'RemanenteSalFav' => '1.5'
  ]));

  $nomina->add($oPagos);
  $nomina->add($detallePercepcion);
  $cfdi->add($nomina);
  //$cfdi->add($deduccion);

  echo $cfdi;
