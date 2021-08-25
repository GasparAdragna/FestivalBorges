<?php

namespace App\Jobs;

use App\Participant;
use App\Activity;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $participant;
    protected $activity;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($participant_id, $activity_id)
    {
        $this->participant_id = $participant_id;
        $this->activity_id = $activity_id;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $participant = Participant::find($this->participant_id);
        $activity = Activity::find($this->activity_id); 
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        if ($activity->activity == "Charla") {
            $beautymail->send('emails.notification', ['activity' => $activity], function($message) use ($participant, $activity)
            {
              $message
                ->from('noreply@festivalborges.com.ar', 'Festival Borges')
                ->to($participant->email, $participant->first_name. ' '.$participant->last_name)
                ->subject('Festival Borges - Accedé a la charla de '.$activity->speaker);
            });
        } else {
            $beautymail->send('emails.notification', ['activity' => $activity], function($message) use ($participant, $activity)
            {
              $message
                ->from('noreply@festivalborges.com.ar', 'Festival Borges')
                ->to($participant->email, $participant->first_name. ' '.$participant->last_name)
                ->subject('Festival Borges - Accedé al taller de '.$activity->speaker);
            });
        }
        $participant->notification = 1;
        $participant->save();
    }
}
