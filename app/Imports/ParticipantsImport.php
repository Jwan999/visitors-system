<?php

namespace App\Imports;

use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $birth_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_birth']));
        if ($row['email_address'] != null)
            return new Participant([
                'name' => $row['middle_name'] !== null ? $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] : $row['first_name'],
                'email' => $row['email_address'],
                'phone' => $row['phone_number_with_whatsapp'],
                'gender' => $row['gender'],
                'governorate' => $row['governorate'],
                'date_of_birth' => $birth_date,
                "nationality" => $row['nationality'],
                "field_of_study" => $row['field_of_study'],
                "educational_background" => $row['educational_background'],
                "university" => Arr::exists($row, 'university') === true ? $row['university'] : null,
                "session_id" => $_REQUEST['session_id'],
            ]);
    }
}