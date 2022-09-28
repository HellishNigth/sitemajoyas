<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Borrar Tablas
        $tablas = ['jugadores','equipo_partido','partidos','equipos','fechas'];
        Schema::disableForeignKeyConstraints();
        foreach($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        Schema::enableForeignKeyConstraints();


        //Equipos
        $equipos = [
            ['nombre'=>'Audax Italiano','entrenador'=>'Francisco Meneghini'],
            ['nombre'=>'Cobresal','entrenador'=>'Gustavo Huerta'],
            ['nombre'=>'Colo Colo','entrenador'=>'Gustavo Quinteros'],
            ['nombre'=>'Coquimbo Unido','entrenador'=>'Juan José Ribera'],
            ['nombre'=>'Curicó Unido','entrenador'=>'Martín Palermo'],
            ['nombre'=>'Deportes Antofagasta','entrenador'=>'Diego Reveco'],
            ['nombre'=>'Deportes Iquique','entrenador'=>'Cristian Leiva'],
            ['nombre'=>'Deportes La Serena','entrenador'=>'Miguel Ponce'],
            ['nombre'=>'Everton','entrenador'=>'Javier Torrente'],
            ['nombre'=>'Huachipato','entrenador'=>'Gustavo Florentín'],
            ['nombre'=>"O'Higgins",'entrenador'=>'Dalcio Giovagnoli'],
            ['nombre'=>'Palestino','entrenador'=>'José Luis Sierra'],
            ['nombre'=>'Santiago Wanderers','entrenador'=>'Miguel Ramírez'],
            ['nombre'=>'Unión Española','entrenador'=>'Ronald Fuentes'],
            ['nombre'=>'Unión La Calera','entrenador'=>'Juan Pablo Vojvoda'],       
            ['nombre'=>'Universidad Católica','entrenador'=>'Ariel Holan'],
            ['nombre'=>'Universidad de Chile','entrenador'=>'Ronald Fuentes'],
            ['nombre'=>'Universidad de Concepción','entrenador'=>'Eduardo Acevedo'], 
        ];

        foreach($equipos as $equipo){
            DB::table('equipos')->insert([
                'nombre' => $equipo['nombre'],
                'entrenador' => $equipo['entrenador'],
                'created_at' => new DateTime('NOW')
            ]);
        }

        //Fechas
        $inicio = DateTime::createFromFormat('Y-m-d','2020-01-24');
        $termino = DateTime::createFromFormat('Y-m-d','2020-01-28');
        for($f=1;$f<=5;$f++){
            DB::table('fechas')->insert([
                'numero' => $f,
                'inicio' => $inicio,
                'termino' => $termino,
                'created_at' => new DateTime('NOW')
            ]);
            $inicio->add(new DateInterval('P7D'));
            $termino->add(new DateInterval('P7D'));

        }

        //Partidos
        $estado = 2;
        $estadio_id = 'E01';
        $local = 1;
        $visita = 0;
        $partidos = [
            ['2020-01-24 18:30',$estado,1,$estadio_id,[9,$local,2],[18,$visita,1]],
            ['2020-01-24 21:00',$estado,1,$estadio_id,[11,$local,1],[15,$visita,2]],
            ['2020-01-25 12:00',$estado,1,$estadio_id,[6,$local,2],[4,$visita,1]],
            ['2020-01-25 20:30',$estado,1,$estadio_id,[1,$local,4],[2,$visita,1]],
            ['2020-01-26 12:00',$estado,1,$estadio_id,[13,$local,0],[16,$visita,3]],
            ['2020-01-26 18:00',$estado,1,$estadio_id,[10,$local,2],[17,$visita,1]],
            ['2020-01-26 20:30',$estado,1,$estadio_id,[14,$local,3],[7,$visita,2]],
            ['2020-01-28 18:00',$estado,1,$estadio_id,[5,$local,1],[8,$visita,0]],
            ['2020-01-26 20:30',$estado,1,$estadio_id,[3,$local,3],[12,$visita,0]],

            ['2020-01-31 21:00',$estado,2,$estadio_id,[15,$local,1],[14,$visita,0]],
            ['2020-02-01 12:00',$estado,2,$estadio_id,[18,$local,0],[13,$visita,2]],
            ['2020-02-01 17:30',$estado,2,$estadio_id,[12,$local,1],[10,$visita,0]],
            ['2020-02-01 17:30',$estado,2,$estadio_id,[17,$local,5],[5,$visita,1]],
            ['2020-02-02 12:00',$estado,2,$estadio_id,[2,$local,2],[3,$visita,1]],
            ['2020-02-02 18:00',$estado,2,$estadio_id,[16,$local,3],[11,$visita,2]],
            ['2020-02-02 20:30',$estado,2,$estadio_id,[7,$local,2],[9,$visita,2]],
            ['2020-02-03 19:30',$estado,2,$estadio_id,[8,$local,0],[6,$visita,1]],
            ['2020-09-01 12:00',$estado,2,$estadio_id,[4,$local,0],[1,$visita,0]],

            ['2020-02-07 21:00',$estado,3,$estadio_id,[8,$local,1],[2,$visita,2]],
            ['2020-02-08 12:00',$estado,3,$estadio_id,[10,$local,1],[18,$visita,1]],
            ['2020-02-08 18:00',$estado,3,$estadio_id,[17,$local,3],[15,$visita,0]],
            ['2020-02-08 20:30',$estado,3,$estadio_id,[5,$local,1],[7,$visita,0]],
            ['2020-02-09 12:00',$estado,3,$estadio_id,[6,$local,2],[16,$visita,3]],
            ['2020-02-09 18:00',$estado,3,$estadio_id,[1,$local,2],[3,$visita,1]],
            ['2020-02-09 20:30',$estado,3,$estadio_id,[14,$local,1],[12,$visita,1]],
            ['2020-02-10 18:00',$estado,3,$estadio_id,[11,$local,2],[13,$visita,1]],
            ['2020-02-10 20:30',$estado,3,$estadio_id,[9,$local,1],[4,$visita,0]],

            ['2020-02-14 18:30',$estado,4,$estadio_id,[15,$local,2],[8,$visita,1]],
            ['2020-02-15 12:00',$estado,4,$estadio_id,[13,$local,1],[17,$visita,2]],
            ['2020-02-15 17:30',$estado,4,$estadio_id,[12,$local,0],[11,$visita,0]],
            ['2020-02-15 21:30',$estado,4,$estadio_id,[7,$local,0],[6,$visita,4]],
            ['2020-02-16 12:00',$estado,4,$estadio_id,[2,$local,1],[9,$visita,1]],
            ['2020-02-16 18:00',$estado,4,$estadio_id,[3,$local,0],[16,$visita,2]],
            ['2020-02-16 21:00',$estado,4,$estadio_id,[18,$local,1],[5,$visita,2]],
            ['2020-02-17 19:30',$estado,4,$estadio_id,[14,$local,1],[1,$visita,2]],
            ['2020-08-29 16:00',$estado,4,$estadio_id,[4,$local,1],[10,$visita,2]],

            ['2020-02-21 12:30',$estado,5,$estadio_id,[6,$local,1],[18,$visita,1]],
            ['2020-02-21 18:30',$estado,5,$estadio_id,[16,$local,3],[7,$visita,1]],
            ['2020-02-22 12:00',$estado,5,$estadio_id,[10,$local,1],[2,$visita,0]],
            ['2020-02-22 20:30',$estado,5,$estadio_id,[9,$local,0],[15,$visita,1]],
            ['2020-02-23 12:00',$estado,5,$estadio_id,[8,$local,3],[13,$visita,0]],
            ['2020-02-23 17:30',$estado,5,$estadio_id,[17,$local,1],[4,$visita,1]],
            ['2020-02-23 20:00',$estado,5,$estadio_id,[1,$local,0],[12,$visita,1]],
            ['2020-02-24 18:00',$estado,5,$estadio_id,[5,$local,1],[3,$visita,0]],
            ['2020-02-24 20:30',$estado,5,$estadio_id,[11,$local,1],[14,$visita,3]],
        ];

        foreach($partidos as $partido){
            $partido_id = DB::table('partidos')->insertGetId([
                'dia_hora' => $partido[0],
                'estado' => $partido[1],
                'fecha_id' => $partido[2],
                'estadio_codigo' => $partido[3] 
            ]);

            for($i=4;$i<=5;$i++){
                DB::table('equipo_partido')->insert([
                    'equipo_id' => $partido[$i][0],
                    'partido_id' => $partido_id,
                    'es_local' => $partido[$i][1],
                    'cantidad_goles' => $partido[$i][2]
                ]);
            }
        }

    }
}
