<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

class VendorImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $collection)
    {
        foreach($collection as $key => $row){


            if ($row[0] =='company_name') {
                // code
            }else{
                  

                $already_exist = Vendor::where('company_name', $row[0])->first();

                if ($already_exist == null) {

                    $vendors = new Vendor();
                    $vendors->company_name = $row[0];
                    $vendors->address = $row[1];
                    $vendors->phone_no = $row[2];
                    $vendors->registration_no = $row[3];
                    $vendors->amount_paid = $row[4];
                    $vendors->outstanding = $row[5];
                    $vendors->total = $row[6];
                    $vendors->date_of_payment = Carbon::parse($row[7])->format('Y-m-d');
                    $vendors->comment = $row[8];
                    $vendors->save();


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
