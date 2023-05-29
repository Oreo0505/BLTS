<?php

namespace App\Traits;

use PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\Config;

trait Report
{
    public function CreateReport($documents, $filters)
    {
        $config = Config::first();

        $pdf = PDF::loadView('report',[
            'barangay' => $config->barangay,
            'municipality' => $config->municipality,
            'logo' => $config->logo,
            'authors' => $filters['authors'],
            'administration' => $filters['administration'],
            'type' => $filters['type'],
            'area' => $filters['area'],
            'documents' => $documents
        ]);

        Storage::disk('local')->makeDirectory('public/Reports');
        $pdf->save('storage/Reports/report.pdf');
    }

    public function deleteFile($path, $disk = 'public')
    {
        Storage::disk($disk)->delete($path);
    }
}