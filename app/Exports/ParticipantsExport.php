<?php

namespace App\Exports;

use App\Participant;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ParticipantsExport implements FromView
{
    public $inscriptos;

    public function __construct($inscriptos)
    {
        $this->inscriptos = $inscriptos;
    }
    public function view(): View
    {
        return view('exports.participants', [
            'participants' => $this->inscriptos
        ]);
    }
}
