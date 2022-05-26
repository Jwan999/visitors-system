<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;




class ParticipantsExport implements FromQuery, WithHeadings, WithMapping
{

    use Exportable;



    public function __construct(Request $request)
    {
        $this->session_id = $request->session_id;
    }

    public function headings(): array
    {
        return ['#', "Name", "Email", "Phone", "Gender", "Governance", "Date of birth", "Nationality", "Field of Study", "University", 'Educational Background', "Attended",];
    }

    /**
     * @var Participant $participant
     */
    public function map($participant): array
    {
        return [
            $participant->id,
            $participant->name,
            $participant->email,
            $participant->phone,
            $participant->gender,
            $participant->governorate,
            $participant->date_of_birth,
            $participant->nationality,
            $participant->field_of_study,
            $participant->university,
            $participant->educational_background,
            $participant->attendance ? 'Yes' : 'No',
        ];
    }

    public function query()
    {
        return Participant::select('*')->where(function ($q) {
            if (!is_null($this->session_id))
                $q->where('session_id', "=", $this->session_id);
        })->orderBy('attendance', 'DESC')->orderBy('name');
    }
}