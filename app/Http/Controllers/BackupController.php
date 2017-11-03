<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use Storage;
use Session;
use Artisan;

class BackupController extends Controller
{

    public function index(Request $request)
    {
        $files = Storage::disk('backup')->allFiles();
        $storage = Storage::disk('backup');
        $backups = [];

        foreach ($files as $k => $f) {
            if (substr($f, -3) == '.gz' && $storage->exists($f)) {
                $e = explode('/', $f);
                
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => $e[0],
                    'file_size' => $storage->size($f),
                    'last_modified' => $storage->lastModified($f),
                ];
            }
        }

        $backups = array_reverse($backups);

        return view('backup.index', compact('backups'));
    }

    public function create()
    {
        $date = Carbon::now()->toW3cString();
        $environment = env('APP_ENV');

        try {

            Artisan::call("db:backup", [
                "--database"        => "mysql",
                "--destination"     => "local",
                "--destinationPath" => "/{$environment}/sefardi_{$environment}_{$date}",
                "--compression"     => "gzip"
 
            ]);

            $output = Artisan::output();

            Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);

            Session::flash('message', 'SE HA REGISTRADO LA SOLICITUD EXITOSAMENTE.');

            return redirect()->back();

        } catch (Exception $e) {

            Session::flash('message-warning', 'SE HA PRODUCIDO UN ERROR AL INTENTAR PROCESAR LA SOLICITUD, NO SE PUDO COMPLETAR EL RESPALDO.');

            return redirect()->back();
        }
    }
    
    public function download($file_name){
     
        if ($disk =  Storage::disk('backup')->exists($file_name)) {
            $fs = "../storage/local/" . $file_name;
    
            return response()->download($fs);

        } else {

            Session::flash('message-warning', 'DISCULPE SE HA PRODUCIDO UN ERROR CON EL RESPALDO, EL ARCHIVO NO EXISTE O ESTA CORRUPTO.');

            return redirect()->back();

            //abort(404, "DISCULPE SE HA PRODUCIDO UN ERROR CON EL RESPALDO, EL ARCHIVO NO EXISTE O ESTA CORRUPTO.");
        }
    }

    public function restore($file_name)
    {
        if($disk = Storage::disk('backup')->exists($file_name))
        {
            Artisan::call("db:restore", [
                "--source"      => "s3",
                "--sourcePath"  => $file_name,
                "--database"    => "mysql",
                "--compression" => "gzip"
            ]);

            Session::flash('message', 'SE HA RESTAURADO LA BASE DE DATOS EXITOSAMENTE.');

            return redirect()->back();

        } else {

            Session::flash('message-warning', 'DISCULPE HA OCURRIDO UN ERROR AL RESTAURAR LA BASE DE DATOS, ARCHIVO CORRUPTO INTENTELO NUEVAMENTE.');

            return redirect()->back();
        }
        
    }

    public function destroy(Request $request)
    {       
        if($disk =  Storage::disk('backup')->exists($request->file_name))
        {
            $delete = Storage::disk('backup')->delete($request->file_name);

            if($delete)
            {
                Session::flash('message', 'SE HA ELIMINADO EL RESPALDO CORRECTAMENTE.');

                return redirect()->back();  

            } else {

                Session::flash('message-warning', 'ERROR AL ELIMINAR EL RESPALDO EL ARCHIVO NO PUDO SER ELIMINADO.');

                return redirect()->back();
                
            }
        } else {

            Session::flash('message-warning', 'ERROR AL ELIMINAR EL RESPALDO EL ARCHIVO NO PUDO SER ELIMINADO PORQUE NO EXISTE.');

            return redirect()->back();
            
        }
    }
}
