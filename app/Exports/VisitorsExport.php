<?php

namespace App\Exports;

use App\Models\Visitor;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VisitorsExport implements FromQuery, WithHeadings, WithMapping, WithStyles
{
    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    public function query()
    {
        return Visitor::query()
            ->whereBetween('visted_at', [
                $this->from . ' 00:00:00',
                $this->to   . ' 23:59:59',
            ]);
    }

    public function headings(): array
    {
        return [
            '#', 'First Name', 'Last Name', 'Mobile',
            'Email', 'Purpose', 'Person to Meet',
            'Department', 'ID Type', 'ID Number',
            'Status', 'Visited At',
        ];
    }

    public function map($visitor): array
    {
        return [
            $visitor->id,
            $visitor->first_name,
            $visitor->last_name,
            $visitor->mobile,
            $visitor->email,
            ucfirst($visitor->purpose),
            $visitor->person_to_meet,
            ucfirst($visitor->department),
            ucfirst($visitor->id_type),
            $visitor->id_number,
            ucfirst($visitor->approval_status),
            $visitor->visted_at?->format('d M Y'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}