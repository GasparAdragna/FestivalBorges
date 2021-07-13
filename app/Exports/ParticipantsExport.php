<?php

namespace App\Exports;

use App\Participant;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ParticipantsExport implements FromView
{
    public function view(): View
    {
        return view('exports.participants', [
            'participants' => Participant::all()
        ]);
    }
}
