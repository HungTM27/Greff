<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompanyExport implements FromCollection
{
    public function headings():array{
        return [
            'status',
            'company_name',
            'company_name(kana)',
            'registed_name',
            'registed_name(kana)',
            'id_city',
            'id_district',
            'room',
            'building',
            'zipcode',
            'hp_url',
            'area',
            'career',
            'contact_name',
            'phone_number',
            'email',
            'other',
            'note',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        return Company::all();
        return collect(Company::getData());
    }
}
