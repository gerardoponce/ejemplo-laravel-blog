<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterChart extends BaseChart
{
    // Configuracion del grafico
    public ?string $name = 'RegisterChart';
    public ?string $routeName = 'registerChart';
    public ?string $prefix = '/';
    public ?array $middlewares = ['auth', 'role:admin'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        // Obteniendo cantidad de registros por mes
        $registerMonth = User::select(DB::raw('COUNT(id) cant, MONTH(created_at) month'), )
                        ->whereRaw('YEAR(created_at) = '.getdate()['year'])
                        ->groupByRaw('month')->pluck('cant', 'month');

        // Listado de meses
        $keys = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", 
                    "Setiembre", "Octubre", "Noviembre", "Diciembre"];
        
        // Agregado datos a meses sin registro
        for ($i=1; $i <= 12; $i++) {
            if(isset($registerMonth[$i])) {
                $values[$i-1] = $registerMonth[$i];
            } else {
                $values[$i-1] = 0;
            }
        }

        // Convirtiendo a una coleccion los datos
        $registerMonth = collect(array_combine($keys, $values));

        // Devolviendo una instancia de Chartisan
        return Chartisan::build()
                        ->labels($registerMonth->keys()->all())
                        ->dataset('Registros', $registerMonth->values()->all());
    }
}