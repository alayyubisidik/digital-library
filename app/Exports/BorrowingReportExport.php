<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BorrowingReportExport implements FromCollection, WithHeadings, WithMapping
{
    protected $borrowings;

    public function __construct($borrowings)
    {
        $this->borrowings = $borrowings;
    }

    public function collection()
    {
        return $this->borrowings;
    }

    public function headings(): array
    {
        // Mendefinisikan header Excel dalam bahasa Indonesia
        return ['Borrower Name', 'Email', 'Book Title', 'Writer', 'Loan Date', 'Date of Return', 'Loan Status'];
    }

    public function map($row): array
    {
        // Mendefinisikan data Excel dari hasil query
        return [
            $row->user->fullname,
            $row->user->email,
            $row->book->title,
            $row->book->writer,
            $row->loan_date,
            $row->date_of_return ?? '-',
            $row->loan_status == 1 ? 'Borrowed' : 'Returned',
        ];
    }
}
