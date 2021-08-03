<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Activity;
use App\Participant;
use App\Speaker;
use Carbon\Carbon;
use Mail;

use App\Exports\ParticipantsExport;
use Maatwebsite\Excel\Facades\Excel;


class FestivalController extends Controller
{
    public function speaker(Speaker $speaker)
    {
      return view('orador')->withSpeaker($speaker);
    }
    public function tallerista(Speaker $speaker)
    {
      return view('orador')->withSpeaker($speaker);
    }
    public function contacto(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255|string',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:65535',
            'g-recaptcha-response' => 'required'
        ]);
        $recaptcha = $request->input('g-recaptcha-response');
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
          'secret' => env('GOOGLE_CAPTCHA'),
          'response' => $recaptcha
        );
        $options = array(
          'http' => array (
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
          )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);
        if ($captcha_success->success) {
            Contact::create($request->all());
            $data = array('consulta'=>$request);
            Mail::send('consulta', $data, function($message){
            $message->to('viviadra@hotmail.com', 'Festival Borges')->subject
                ('¡Nueva consulta en el sitio!');
            $message->from('noreply@festivalborges.com.ar','Festival Borges');
            });

            return redirect()->back()->with('status', 'Se envió correctamente la consulta');
        } else {
          return redirect()->back()->with('error', 'No se pudo enviar su consulta. Intente nuevamente');
        }
    }
    public function test()
    {
      $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
      $activity = Activity::first();
      $beautymail->send('emails.welcome', ['activity' => $activity], function($message)
      {
        $message
          ->from('noreply@festivalborges.com.ar', 'Festival Borges')
          ->to('gaspar.jac@hotmail.com', 'Gaspar Adragna')
          ->subject('¡Bienvenido! - Inscripción exitosa');
      });
    }
    public function agregarActividad(Request $request)
    {
      $validate = $request->validate([
        'name' => 'required|string',
        'speaker_id' => 'required',
        'description' => 'required|string',
        'date' => 'required|date',
        'activity' => 'required|string'
      ]);
      $speaker = Speaker::find($request->speaker_id);
      Activity::create($request->all() + ['speaker' => $speaker->first_name.' '.$speaker->last_name]);
      return redirect()->back()->with('status', 'Se creó correctamente la actividad');
    }
    public function agregarOrador(Request $request)
    {
      $validate = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'location' => 'required|string',
        'bio' => 'required|string',
        'photo' => 'required|string',
        'slug' => 'required|string',
      ]);
      Speaker::create($request->all());
      return redirect()->back()->with('status', 'Se añadió correctamente al orador');
    }
    public function talleres()
    {
      $talleres = Activity::where('activity', 'Taller')->get();
      return view('talleres', compact('talleres'));
    }
    public function charlas()
    {
      $charlas = Activity::where('activity', 'Charla')->orderBy('date', 'asc')->get();
      return view('conferencias', compact('charlas'));
    }
    public function experiencia()
    {
      $charlas = Activity::where('activity', 'Experiencia Borges')->orderBy('date', 'asc')->get();
      return view('experiencia', compact('charlas'));
    }
    public function porDia($dia)
    {
      $actividades = Activity::whereDay('date', $dia)->get();
      return view('pordia', compact('actividades', 'dia'));
    }
    public function inscribirse(Request $request)
    {
      $validate = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|string',
        'birthday' => 'required|date',
        'sex' => 'required|string',
        'activity_id' => 'required|int',
        'country' => 'required|string'
      ]);

      if(!Participant::where('email', $request->email)->where('activity_id', $request->activity_id)->count()){
        $inscripto = Participant::create($request->all());
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $activity = Activity::find($request->activity_id);
        if(Participant::where('email', $request->email)->count() > 1){
          $beautymail->send('emails.inscripto', ['activity' => $activity], function($message) use ($request, $activity)
          {
            $message
              ->from('noreply@festivalborges.com.ar', 'Festival Borges')
              ->to($request->email, $request->first_name. ' '.$request->last_name)
              ->subject('Inscripción exitosa a la charla de '.$activity->speaker);
          });
        } else {
          $beautymail->send('emails.welcome', ['activity' => $activity], function($message) use ($request)
          {
            $message
              ->from('noreply@festivalborges.com.ar', 'Festival Borges')
              ->to($request->email, $request->first_name. ' '.$request->last_name)
              ->subject('¡Bienvenido! - Inscripción exitosa');
          });
        }
        return redirect()->back()->with('status', 'Inscripción exitosa! Le enviaremos un recordatorio cuando se acerce la fecha de la actividad. Por favor revise su casilla de SPAM');
      }
      return redirect()->back()->with('error', 'Usted ya está inscripto en esta actividad');
    }
    public function vistaAgregarOrador()
    {
      return view('agregarOrador');
    }
    public function vistaAgregarActividad()
    {
      $oradores = Speaker::all();
      return view('agregarActividad', compact('oradores'));
    }
    public function verInscriptos()
    {
      $participants = Participant::all();
      $activities = Activity::orderBy('date', 'asc')->get();
      return view('inscriptos', compact('participants', 'activities'));
    }
    public function descargarInscriptos()
    {
      return Excel::download(new ParticipantsExport, 'Participantes.'.Carbon::now()->format('d-m-Y').'.xlsx');
    }

}
