<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use PDF;
class EstadisticasController extends Controller
{
    private function getStock(){
        $stockProductos = collect();
        foreach(Producto::all() as $producto){
            $stockProductos->add([
                'nombreProd' => $producto->nombreProd,
                'cantidadProd' => $producto->cantidadProd,
                'precioProd' => $producto->precioProd,
                'fechaIngreso' => $producto->fechaIngreso,
                'ventasProd' => $producto->ventas->count()
            ]);
        }
        $stockProductos = $stockProductos->sortBy('nombreProd');
        return $stockProductos;

    }

    public function stockProductos(){
        
        $stockProductos = $this->getStock();
        return view('estadisticas.stock',compact('stockProductos'));
    }
    //REPORTE TOTAL
    private function getReporte(){
        $reporteMensual = collect();
        foreach(Venta::all() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortByDesc('fechaVenta');
        return $reporteMensual;
    }
    public function reporteMensual(){
        $reporteMensual = $this->getReporte();
        $venta = Venta::all();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.reporte',compact('reporteMensual','ganancias'));
    }
    //REPORTE TOTAL
    
    //Reporte Noviembre
    private function getReporteNoviembre(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(11))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualNoviembre(){
        $reporteMensual = $this->getReporteNoviembre();
        $venta = Venta::whereMonth('fechaVenta', now()->month(11))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.noviembre',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Noviembre

    //Reporte Diciembre
    private function getReporteDiciembre(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(12))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualDiciembre(){
        $reporteMensual = $this->getReporteDiciembre();
        $venta = Venta::whereMonth('fechaVenta', now()->month(12))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.diciembre',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Diciembre

    //Reporte Enero
    private function getReporteEnero(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(1))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualEnero(){
        $reporteMensual = $this->getReporteEnero();
        $venta = Venta::whereMonth('fechaVenta', now()->month(1))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.enero',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Enero

    //Reporte Febrero
    private function getReporteFebrero(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(2))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualFebrero(){
        $reporteMensual = $this->getReporteFebrero();
        $venta = Venta::whereMonth('fechaVenta', now()->month(2))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.febrero',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Febrero

    //Reporte Marzo
    private function getReporteMarzo(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(3))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualMarzo(){
        $reporteMensual = $this->getReporteMarzo();
        $venta = Venta::whereMonth('fechaVenta', now()->month(3))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.marzo',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Marzo

    //Reporte Abril
    private function getReporteAbril(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(4))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualAbril(){
        $reporteMensual = $this->getReporteAbril();
        $venta = Venta::whereMonth('fechaVenta', now()->month(4))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.abril',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Abril

    //Reporte Mayo
    private function getReporteMayo(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(5))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualMayo(){
        $reporteMensual = $this->getReporteMayo();
        $venta = Venta::whereMonth('fechaVenta', now()->month(5))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.mayo',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Mayo

    //Reporte Junio
    private function getReporteJunio(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(6))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualJunio(){
        $reporteMensual = $this->getReporteJunio();
        $venta = Venta::whereMonth('fechaVenta', now()->month(6))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.junio',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Junio

    //Reporte Julio
    private function getReporteJulio(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(7))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualJulio(){
        $reporteMensual = $this->getReporteJulio();
        $venta = Venta::whereMonth('fechaVenta', now()->month(7))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.julio',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Julio

    //Reporte Agosto
    private function getReporteAgosto(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(8))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualAgosto(){
        $reporteMensual = $this->getReporteAgosto();
        $venta = Venta::whereMonth('fechaVenta', now()->month(8))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.agosto',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Agosto

    //Reporte Septiembre
    private function getReporteSeptiembre(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(9))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualSeptiembre(){
        $reporteMensual = $this->getReporteSeptiembre();
        $venta = Venta::whereMonth('fechaVenta', now()->month(9))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.septiembre',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Septiembre

    //Reporte Octubre
    private function getReporteOctubre(){
        $reporteMensual = collect();
        foreach(Venta::whereMonth('fechaVenta', now()->month(10))->get() as $venta){
            $reporteMensual->add([
                'nombreProd' => $venta->productos->first()!=null?$venta->productos->first()->nombreProd:'Producto Eliminado',
                'nombreClie' => $venta->cliente!=null?$venta->cliente->nombreClie.' ' .$venta->cliente->apellidoClie:'Cliente Eliminado',
                'cantidad' => $venta->cantidad,
                'fechaVenta' => $venta->fechaVenta,
                'totalVenta' => $venta->totalVenta,
            ]);
        }
        $reporteMensual = $reporteMensual->sortBy('nombreProd');
        return $reporteMensual;

    }
    public function reporteMensualOctubre(){
        $reporteMensual = $this->getReporteOctubre();
        $venta = Venta::whereMonth('fechaVenta', now()->month(10))->get();
        $ganancias = $venta->sum('totalVenta');

        return view('estadisticas.octubre',compact('reporteMensual','ganancias'));
        // $ventas = Venta::whereMonth('fechaVenta',now()->month(11))->get();
    }
    //Reporte Octubre

    public function descargarStockProductos(){
        $stockProductos = $this->getStock();
        $pdf = PDF::loadView('estadisticas.stock',compact('stockProductos'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('stock.pdf');
    }

    public function descargarReporteMensual(){
        $reporteMensual = $this->getReporte();
        $venta = Venta::all();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.reporte',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte.pdf');
    }
    //descargar Noviembre
    public function descargarReporteNoviembre(){
        $reporteMensual = $this->getReporteNoviembre();
        $venta = Venta::whereMonth('fechaVenta', now()->month(11))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.noviembre',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-noviembre.pdf');
    }
    //descargar Noviembre

    //descargar Diciembre
    public function descargarReporteDiciembre(){
        $reporteMensual = $this->getReporteDiciembre();
        $venta = Venta::whereMonth('fechaVenta', now()->month(12))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.diciembre',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-diciembre.pdf');
    }
    //descargar Diciembre

    //descargar Enero
    public function descargarReporteEnero(){
        $reporteMensual = $this->getReporteEnero();
        $venta = Venta::whereMonth('fechaVenta', now()->month(1))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.enero',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-enero.pdf');
    }
    //descargar Enero

    //descargar Febrero
    public function descargarReporteFebrero(){
        $reporteMensual = $this->getReporteFebrero();
        $venta = Venta::whereMonth('fechaVenta', now()->month(2))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.febrero',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-febrero.pdf');
    }
    //descargar Febrero

    //descargar Marzo
    public function descargarReporteMarzo(){
        $reporteMensual = $this->getReporteMarzo();
        $venta = Venta::whereMonth('fechaVenta', now()->month(3))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.marzo',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-marzo.pdf');
    }
    //descargar Marzo

    //descargar Abril
    public function descargarReporteAbril(){
        $reporteMensual = $this->getReporteAbril();
        $venta = Venta::whereMonth('fechaVenta', now()->month(4))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.abril',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-abril.pdf');
    }
    //descargar Abril

    //descargar Mayo
    public function descargarReporteMayo(){
        $reporteMensual = $this->getReporteMayo();
        $venta = Venta::whereMonth('fechaVenta', now()->month(5))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.mayo',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-mayo.pdf');
    }
    //descargar Mayo

    //descargar Junio
    public function descargarReporteJunio(){
        $reporteMensual = $this->getReporteJunio();
        $venta = Venta::whereMonth('fechaVenta', now()->month(6))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.junio',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-junio.pdf');
    }
    //descargar Junio

    //descargar Julio
    public function descargarReporteJulio(){
        $reporteMensual = $this->getReporteJulio();
        $venta = Venta::whereMonth('fechaVenta', now()->month(7))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.julio',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-julio.pdf');
    }
    //descargar Julio

    //descargar Agosto
    public function descargarReporteAgosto(){
        $reporteMensual = $this->getReporteAgosto();
        $venta = Venta::whereMonth('fechaVenta', now()->month(8))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.agosto',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-agosto.pdf');
    }
    //descargar Agosto

    //descargar Septiembre
    public function descargarReporteSeptiembre(){
        $reporteMensual = $this->getReporteSeptiembre();
        $venta = Venta::whereMonth('fechaVenta', now()->month(9))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.septiembre',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-septiembre.pdf');
    }
    //descargar Septiembre

    //descargar Octubre
    public function descargarReporteOctubre(){
        $reporteMensual = $this->getReporteOctubre();
        $venta = Venta::whereMonth('fechaVenta', now()->month(10))->get();
        $ganancias = $venta->sum('totalVenta');
        $pdf = PDF::loadView('estadisticas.octubre',compact('reporteMensual','ganancias'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('reporte-octubre.pdf');
    }
    //descargar Octubre
}
