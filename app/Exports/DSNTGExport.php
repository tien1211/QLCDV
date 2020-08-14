<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

use DB;


class DSNTGExport implements FromView,ShouldAutoSize
{
   
    public function view(): View
        {
        return route('Tour_ViewExport',['id'=>$id]);
    }
}
