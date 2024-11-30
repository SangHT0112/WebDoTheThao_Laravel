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
        return Customer::select('id','name','phone','address','email','content','created_at','total',)->whereBetween('created_at', [$this->tungay, $this->denngay])->whereNotNull('token')
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
            'Ngày đặt hàng',
            ' Số tiền',
        ];
    }


    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
        $tungay = \Carbon\Carbon::parse($this->tungay)->format('d-m-Y');
        $denngay = \Carbon\Carbon::parse($this->denngay)->format('d-m-Y');

        $tieude = 'Doanh thu từ ' . $tungay . ' đến ' . $denngay ;
        $sheet->mergeCells('A1:H1');
        $sheet->setCellValue('A1',$tieude );
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->fromArray($this->headings(),NULL,'A2');
        $sheet->getStyle('A2:H2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A2:H2')->getFill()->getStartColor()->setRGB('FFFF00');
        $sheet->getStyle('A2:H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2:H2')->getFont()->setBold(true);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('A')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(25);
        $sheet->getColumnDimension('H')->setWidth(25);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->fromArray($this->collection()->toArray(), NULL, 'A3');
        $sl=$this->collection()->count();
        $tongtien=Customer::select('total')->whereBetween('created_at', [$this->tungay, $this->denngay])->whereNotNull('token')
            ->sum('total');
        $sheet->setCellValue('G' . ($sl + 3), 'Tổng doanh thu:');
        $sheet->setCellValue('H' . ($sl + 3), $tongtien);
        $sheet->getStyle('H' . ($sl + 3))
        ->getNumberFormat()
            ->setFormatCode('#,##0' . ' "VND"');
        $sheet->getStyle('H' . ($sl + 2))
            ->getNumberFormat()
            ->setFormatCode('#,##0' . ' "VND"');
    }
    public function columnFormats(): array
    {
        return [
            'H' => '#,##0 "VND"',
        ];
    }
}
