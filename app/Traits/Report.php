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
        $report_year = date('Y');
        $report_number = $config->current_report;
        
        if($report_year != $config->report_year){
            $config->report_year = $report_year;
            $config->current_report = 1;
            $config->save();
        }

        $pdf = PDF::loadView('report',[
            'year' => $report_year,
            'number' => $report_number,
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