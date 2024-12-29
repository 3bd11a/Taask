<?php

namespace App\Exports;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PostsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::all();
    }
    public function headings(): array
    {
        // Define the headings for the Excel sheet
        return [
            'ID',
            'User ID',
            'Title',
            'Body',
            'Created At',
            'Updated At',
        ];
    }
    
}
