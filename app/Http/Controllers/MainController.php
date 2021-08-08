<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function renderPageTemplate($pageName)
    {
        switch ($pageName) {
<<<<<<< HEAD
            case 'device':return view('modules/device')->with('devices', $this->tables());
            case 'model':return view('modules/model');
=======
            case 'device':
                return view('modules/device')->with('devices', $this->tables()['model']);
            case 'model':
                return view('modules/model');
>>>>>>> 0.0.2
            default:
                return view('modules/table')->with('array', $this->tables());
        }
    }


<<<<<<< HEAD
    private function tables()
    {
        $model = DB::table('model')->select('name', 'validator')->get();
        $device = DB::table('device')->join('model', function ($join) {
            $join->on('model.id', '=', 'device.model');
        })->get();
        return ['model' => $model, 'device' => $device];
    }


    static function find($id)
    {
        return DB::table('device')->where('serial')->first();
       // view('modules/table')->with('array', $this->tables());
    }

    
    static function createModel($mask, $name)
    {
        if (!preg_match('/^[NAaXZ]+$/', $mask)) return(json_encode(['message' => 'bad mask']));
        if (strlen($name) < 2 or strlen($name) > 80) return(json_encode(['message' => 'bad name']));
        if (DB::table('model')->where('name', $name)->count() === 0) {
            DB::table('model')->insert([
                'validator' => $mask,
=======
    static function find($request)
    {
        if (isset($request['serial'])) {
            $serial = DB::table('device')->select('name')->join('model', function ($join) {
                $join->on('model.id', '=', 'device.model');
            })->where('serial', $request['serial'])->first();
            return json_encode(['message' => ($serial ? ('Занят: ' . $serial->name) : 'Пока не добавлен')]);
        } else return (json_encode(['message' => 'No argument passed SERIAL']));
    }


    static function createModel($request)
    {
        if (isset($request['name'])) {
            $name = $request['name'];
        } else  return (json_encode(['message' => 'No argument passed NAME']));

        if (isset($request['template'])) {
            $template = $request['template'];
        } else  return (json_encode(['message' => 'No argument passed MASK']));

        if (strlen($name) < 2 or strlen($name) > 80) return (json_encode(['message' => 'Bad name']));
        if (!preg_match('/^[NAaXZ]+$/', $template)) return (json_encode(['message' => 'Bad mask']));

        if (DB::table('model')->where('name', $name)->count() === 0) {
            DB::table('model')->insert([
                'template' => $template,
>>>>>>> 0.0.2
                'name' => $name
            ]);
            return json_encode(['message' => 'Append']);
        } else {
<<<<<<< HEAD
            return json_encode(['message' => 'this value already exists']);
        }
    }
=======
            return json_encode(['message' => 'This value already exists']);
        }
    }


    static function createDevice($request)
    {
        if (isset($request['model'])) {
            $model = $request['model'];
        } else  return (json_encode(['message' => 'No argument passed MODEL']));

        if (isset($request['serial'])) {
            $serials = $request['serial'];
        } else  return (json_encode(['message' => 'No argument passed SERIAl']));

        $serials = preg_split("/[\s,]+/", $serials);
        $query = DB::table('model')->where('id', $model)->first();

        if (isset($query->template)) {
            $regular =  (new MainController())->buildRegExp($query->template);
            $errorAccumulator = [];

            foreach ($serials as $serial) {
                if (preg_match($regular, $serial)) {
                    if (DB::table('device')->where('serial', $serial)->count() === 0) {
                        DB::table('device')->insert([
                            'model' => $model,
                            'serial' => $serial
                        ]);
                    } else {
                        array_push($errorAccumulator,  $serial . ' - уже есть в базе');
                    }
                } else array_push($errorAccumulator,  $serial . ' - не прошел проверку');
            }
            if (count($errorAccumulator))
                return (json_encode(['message' => implode(PHP_EOL, $errorAccumulator)]));
            else
                return (json_encode(['message' => 'Все успешно добавлены']));
        } else {
            return (json_encode(['message' => 'Cant find id model']));
        }
    }


    private function buildRegExp($str)
    {
        $accumulator = [];
        for ($i = 0; $i < strlen($str); $i++) {
            switch ($str[$i]) {
                case 'N':
                    array_push($accumulator, '[0-9]');
                    break;
                case 'A':
                    array_push($accumulator, '[A-Z]');
                    break;
                case 'a':
                    array_push($accumulator, '[a-z]');
                    break;
                case 'X':
                    array_push($accumulator, '[A-Z0-9]');
                    break;
                case 'Z':
                    array_push($accumulator, '[-_@]');
                    break;
            }
        }
        return '/^' . implode("", $accumulator) . '$/';
    }


    private function tables()
    {
        $model = DB::table('model')->get();
        $device = DB::table('device')->join('model', function ($join) {
            $join->on('model.id', '=', 'device.model');
        })->get();
        return ['model' => $model, 'device' => $device];
    }
>>>>>>> 0.0.2
}
