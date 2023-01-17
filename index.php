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
use Charles\CFDI\Node\Complemento\Nomina\Percepcion\DetallePercepcionPPP;
use Charles\CFDI\Node\Complemento\Nomina\Percepcion\DetPercIndenmizacion;
use Charles\CFDI\Node\Complemento\Nomina\Percepcion\HorasExtras;

  $cer = file_get_contents('./keys/CCD110601RB6_C.pem');
  $key = file_get_contents('./keys/CCD110601RB6_K.pem');

  $cfdi = new CFDI([
    "Descuento" => "203.59",
    "Fecha" => "2023-01-15T23:27:27",
    "Folio" => "921",
    "LugarExpedicion" => "50245",
    "MetodoPago" => "PUE",
    "Moneda" => "MXN",
    "Serie" => "200",
    "SubTotal" => "3681.44",
    "TipoDeComprobante" => "N",
    "Total" => "3477.85",
    "Exportacion" => "01",
    "Version" => "4.0",
    "NoCertificado" => "00001000000500766575"
  ], $cer, $key);

  $cfdi->add(new Emisor([
    "Rfc" => "CCD110601RB6",
    "Nombre" => "INNOVACION EN LOGISTICA Y DISTRIBUCION, SA DE CV",
    "RegimenFiscal" => "601"
  ]));

  $cfdi->add(new Receptor([
    "DomicilioFiscalReceptor" => "11700",
    "Nombre" => "LEON ACOSTA JOSE ORLANDO",
    "RegimenFiscalReceptor" => "605",
    "Rfc" => "LEAO911202AI7",
    "UsoCFDI" => "CN01"
  ]));

  $cfdi->add(new Concepto([
    "Cantidad" => "1",
    "ClaveProdServ" => "84111505",
    "ClaveUnidad" => "ACT",
    "Descripcion" => "Pago de nómina",
    "Descuento" => "203.59",
    "Importe" => "3681.44",
    "ObjetoImp" => "01",
    "ValorUnitario" => "3681.44"
  ]));

  $nomina = new Nomina([
    "FechaFinalPago" => "2022-12-31",
    "FechaInicialPago" => "2022-12-01",
    "FechaPago" => "2022-12-15",
    "NumDiasPagados" => "15.000",
    "TipoNomina" => "E",
    "TotalDeducciones" => "203.59",
    "TotalOtrosPagos" => "0.00",
    "TotalPercepciones" => "3681.44",
    "Version" => "1.2"
  ]);

  $nomina->add(new EmisorN([
    'RegistroPatronal' => 'Y6664153100'
  ]));

  $nomina->add(new ReceptorN([
    "Antigüedad" => "P85W",
    "ClaveEntFed" => "CMX",
    "Curp" => "LEAO911202HSLNCR06",
    "Departamento" => "UNICO",
    "FechaInicioRelLaboral" => "2021-05-16",
    "NumEmpleado" => "71404",
    "NumSeguridadSocial" => "23109117939",
    "PeriodicidadPago" => "99",
    "RiesgoPuesto" => "5",
    "SalarioBaseCotApor" => "418.08",
    "SalarioDiarioIntegrado" => "400.00",
    "TipoContrato" => "01",
    "TipoJornada" => "01",
    "TipoRegimen" => "02"
  ]));
  $nomina->add(new Deduccion([
    "TotalImpuestosRetenidos" => "203.59",
    "TotalOtrasDeducciones" => "0.00"
  ]));

  $nomina->add(new DetalleDeduccion([
    "Clave" => "D001",
    "Concepto" => "ISR",
    "Importe" => "203.59",
    "TipoDeduccion" => "002"
  ]));

  $nomina->add(new Percepcion([
    "TotalExento" => "2886.60",
    "TotalGravado" => "794.84",
    "TotalSeparacionIndemnizacion" => "0.00",
    "TotalSueldos" => "3681.44"
  ]));

  $detallePercepcion = new DetallePercepcion([
    "Clave" => "P086",
    "Concepto" => "AGUINALDO",
    "ImporteExento" => "2886.60",
    "ImporteGravado" => "794.84",
    "TipoPercepcion" => "002"
  ]);
  /*$detallePercepcionPPP = new DetallePercepcionPPP([
    'TotalUnaExhibicion' => '200',
    'IngresoAcumulable' => '0.00',
    'IngresoNoAcumulable' => '0.00'
  ]);
  $detPercIndemnizacion = new DetPercIndenmizacion([
    'TotalPagado' => '1500.00',
    'NumAñosServicio' => '1',
    'UltimoSueldoMensOrd' => '1500.00',
    'IngresoAcumulable' => '0.00',
    'IngresoNoAcumulable' => '0.00'
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
  $oPagos->add(new CompensacionSaldosAFavor([
    'SaldoAFavor' => '1.5',
    'Año' => '2018',
    'RemanenteSalFav' => '1.5'
  ]));*/

  $oPagos =new OtrosPagos([
    "Clave" => "D600",
    "Concepto" => "SUBSIDIO PARA EL EMPLEO EFECTIVAMENTE ENTREGADO AL TRABAJADOR",
    "Importe" => "0.00",
    "TipoOtroPago" => "002"
  ]);

  $oPagos->add(new SubsidioAlEmpleo([
    'SubsidioCausado' => '0.00'
  ]));

  $nomina->add($oPagos);
  $nomina->add($detallePercepcion);
  //$nomina->add($detallePercepcionPPP);
  //$nomina->add($detPercIndemnizacion);
  $cfdi->add($nomina);
  //$cfdi->add($deduccion);

  echo $cfdi;
