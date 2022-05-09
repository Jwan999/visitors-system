<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\ToModel;

class ParticipantsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Participant([
            'name' => $row['second'] !== null ? $row['first'] + $row['second'] + $row['third'] : $row['first'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'gender' => $row['gender'],
            'governorate' => $row['governorate'],
            'age' => $row['age'],

        ]);
    }
}
