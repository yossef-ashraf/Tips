<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

trait TipsTrait{
    public function Artisan(array $array ) : bool
    {
        try {
            //code...
            foreach ($array as $str) {
                Artisan::call('make:resource', [
                    'name' => $str.'Resource'
            ]);
                Artisan::call('make:controller', [
                    'name' => $str.'Controller'
            ]);
            Artisan::call('make:model '.$str.' -m');
            sleep(1);
            }
            return true ;
        } catch (\Throwable $th) {
            //throw $th;
            return false ;
        }

    }

    public function copyFileAndCreateDirectories($sourcePath, $destinationPath, $fileName): bool {
        $destinationFilePath = $destinationPath . '/' . $fileName;
    
        if (file_exists($sourcePath)) {
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            if (copy($sourcePath, $destinationFilePath)) {
                
                unlink($sourcePath);
                return true;
            } else {
                return false; 
            }
        } else {
            return false;
        }
    }

 
    public function makeCsv($model, array $headers, array $columns = [], bool $download = false ,$chunkSize = 10000)
    {
        try {
            $fileName = $model . '-' . time() . '.csv';
            $file_path = storage_path('app/public/' . $fileName); // Use storage_path() for consistent paths
            $handle = fopen($file_path, 'w');
            fputcsv($handle, $headers);
            DB::table($model)->orderBy('id')->chunk($chunkSize, function ($records) use ($handle, $columns) {
                foreach ($records as $record) {
                    $recordData = [];
                    foreach ($columns as $column) {
                        $recordData[] = $record->{$column};
                    }
                    fputcsv($handle, $recordData);
                }
            });
            fclose($handle);
            // Store the exported file in the local disk
            Storage::disk('public')->put($fileName, file_get_contents($file_path));
            if ($download) {
                return  Storage::download('public/' . $fileName);
            }
            return $fileName;
        } catch (\Throwable $th) {
                // return $th->getMessage();
                return false;
        }
    }



}





