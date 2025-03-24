<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use App\Models\Fumigation;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

class FumigationImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $collection)
    {
        foreach($collection as $key => $row){


            if ($row[0] =='name_of_premises') {
                // code
            }else{
                  

                $already_exist = Fumigation::where('name_of_premises', $row[0])->first();

                if ($already_exist == null) {

                    $fumigations = new Fumigation();
                    $fumigations->name_of_premises = $row[0];
                    $fumigations->address_of_premises = $row[1];
                    $fumigations->phone_no = $row[2];
                    $fumigations->date_of_fumigation = Carbon::parse($row[3])->format('Y-m-d');
                    $fumigations->vendors_use = $row[4];
                    $fumigations->cert_no = $row[5];
                    $fumigations->issue_date = Carbon::parse($row[6])->format('Y-m-d');
                    $fumigations->expires_date = Carbon::parse($row[7])->format('Y-m-d');
                    $fumigations->save();


                    // dd($row[1]);
                    // insert into Fumigation

                    // Fumigation::create([
                    //     "name_of_premises"      => $row[0],
                    //     "address_of_premises"   => $row[1],
                    //     "phone_no"              => $row[2],
                    //     "date_of_fumigation"    => Carbon::parse($row[3])->format('Y-m-d'),
                    //     "vendors_use"           => $row[4],
                    //     "cert_no"               => $row[5],
                    //     "issue_date"            => Carbon::parse($row[6])->format('Y-m-d'),
                    //     "expires_date"          => Carbon::parse($row[7])->format('Y-m-d'),
                    // ]);
                }
            }
        }

    }

    // public function transformDate($value, $format = 'Y-m-d')
    // {
    //     try {
    //         return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    //     } catch (\ErrorException $e) {
    //      return \Carbon\Carbon::createFromFormat($format, $value);
    //     }
    // }
}
