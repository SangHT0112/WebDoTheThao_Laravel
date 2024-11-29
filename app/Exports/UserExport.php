<?php

namespace App\Exports;

use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Http\Controllers\Admin\CartController;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
class UserExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $tungay;
    protected $denngay;
    public function __construct($tungay, $denngay)
    {
        $this->tungay = $tungay;
        $this->denngay = $denngay;
    }
    public function collection()
    {
        return Customer::select('id','name','phone','address','email','content','total')->whereBetween('created_at', [$this->tungay, $this->denngay])->whereNotNull('token')
        ->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Họ tên',
            'SDT',
            'Địa chỉ',
            'Email',
            'Ghi chú',
            'Tổng tiền',
        ];
    }


    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {

        $sheet->getStyle('A1:G1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A1:G1')->getFill()->getStartColor()->setRGB('FFFF00'); // Màu vàng cho tiêu đề
        $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(25);
        $sheet->getColumnDimension('B')->setWidth(25);
    }
    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
