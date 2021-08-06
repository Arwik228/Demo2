<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function renderPageTemplate($pageName)
    {
        switch ($pageName) {
            case 'device':return view('modules/device')->with('devices', $this->tables());
            case 'model':return view('modules/model');
            default:
                return view('modules/table')->with('array', $this->tables());
        }
    }


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
                'name' => $name
            ]);
            return json_encode(['message' => 'Append']);
        } else {
            return json_encode(['message' => 'this value already exists']);
        }
    }
}
