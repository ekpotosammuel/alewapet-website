<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use App\Models\Decontamination;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

class DecontaminationImport implements ToCollection
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
                  

                $already_exist = Decontamination::where('name_of_premises', $row[0])->first();

                if ($already_exist == null) {

                    $decontaminations = new Decontamination();
                    $decontaminations->name_of_premises = $row[0];
                    $decontaminations->address_of_premises = $row[1];
                    $decontaminations->phone_no = $row[2];
                    $decontaminations->date_of_fumigation = Carbon::parse($row[3])->format('Y-m-d');
                    $decontaminations->cert_no = $row[4];
                    $decontaminations->issue_date = Carbon::parse($row[5])->format('Y-m-d');
                    $decontaminations->expires_date = Carbon::parse($row[6])->format('Y-m-d');
                    $decontaminations->save();


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
