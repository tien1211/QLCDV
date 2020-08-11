<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\CongDoanVien;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class CongDoanVienExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return CongDoanVien::all();
//     }
// }
class CongDoanVienExport implements FromView,ShouldAutoSize
{
    public function view(): View
        {
            return view('admin.CongDoanVien.CDV-Excel', [
                'CongDoanVien' => CongDoanVien::all()
            ]);
        }
}