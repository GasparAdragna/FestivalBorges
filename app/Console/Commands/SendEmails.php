<?php

namespace App\Console\Commands;

use App\Participant;
use App\Activity;
use App\Jobs\SendEmail;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {activity_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails with link to participants';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $activity = Activity::find($this->argument('activity_id'));
        $participants = Participant::where('activity_id', $this->argument('activity_id'))->where('notification', 0)->get();
        $total = $participants->count();
        $this->info("To process: Total Emails: {$total}");
        //if ($this->confirm('Quiere enviar los mails?')) {
            $processeds = 0;
            foreach ($participants as $participant) {
                try {
                    SendEmail::dispatchNow($participant->id, $activity->id);
                    $processeds++;
                    $this->info("{$processeds}/{$total}");
                } catch (Exception $error) {
                    $this->info("Error en partipante {$participant->id}");
                }
            }   
        //}
        $this->warn("Terminado de mandar los emails");
    }
}
