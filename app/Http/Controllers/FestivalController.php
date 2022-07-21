<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;

use App\Contact;
use App\Activity;
use App\Participant;
use App\Speaker;
use App\Festival;
use Carbon\Carbon;
use Mail;

use App\Exports\ParticipantsExport;
use Maatwebsite\Excel\Facades\Excel;


class FestivalController extends Controller
{
    public function create()
    {
        return view('festivals.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'active' => 'required',
        ]);
        Festival::create($request->all());
        return redirect()->back()->with('status', 'Se creó correctamente el festival');
    }

    public function edit(Festival $festival)
    {
        return view('festivals.edit', compact('festival'));
    }

    public function update(Request $request, Festival $festival)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'active' => 'required',
        ]);
        $festival->update($request->all());
        return redirect()->back()->with('status', 'Se actualizó correctamente el festival');
    }

    public function speaker(Speaker $speaker)
    {
      $festival = Festival::where('active', 1)->first();
      $activities = Activity::where('speaker_id', $speaker->id)->where('festival_id', $festival->id)->get();
      $pastActivities = Activity::where('speaker_id', $speaker->id)->where('festival_id', '!=', $festival->id)->get();
      return view('orador', compact('speaker', 'activities', 'pastActivities'));
    }
    public function tallerista(Speaker $speaker)
    {
      $festival = Festival::where('active', 1)->first();
      $activities = Activity::where('speaker_id', $speaker->id)->where('festival_id', $festival->id)->get();
      $pastActivities = Activity::where('speaker_id', $speaker->id)->where('festival_id', '!=', $festival->id)->get();
      return view('orador', compact('speaker', 'activities', 'pastActivities'));
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
    public function talleres()
    {
      $festival = Festival::where('active', 1)->first();
      $talleres = Activity::where('festival_id', $festival->id)->where('activity', 'Taller')->get();
      return view('talleres', compact('talleres'));
    }
    public function charlas()
    {
      $festival = Festival::where('active', 1)->first();
      $charlas = Activity::where('festival_id', $festival->id)->where('activity', 'Charla')->orderBy('date', 'asc')->get();
      return view('conferencias', compact('charlas'));
    }
    public function experiencia()
    {
      $festival = Festival::where('active', 1)->first();
      $charlas = Activity::where('festival_id', $festival->id)->where('activity', 'Experiencia Borges')->orderBy('date', 'asc')->get();
      return view('experiencia', compact('charlas'));
    }
    public function porDia($dia)
    {
      $festival = Festival::where('active', 1)->first();
      $actividades = Activity::where('festival_id', $festival->id)->whereDay('date', $dia)->get();
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
        'country' => 'required|string',
        'tyc' => 'required'
      ]);
      
      $now = now('America/Argentina/Buenos_Aires');
      $activity = Activity::find($request->activity_id);

      if($now->gt($activity->date)){
        return redirect()->back()->with('error', 'No se puede inscribir a la actividad debido a que ya pasó');
      }

      Cookie::queue('first_name', $request->first_name, 1440);
      Cookie::queue('last_name', $request->last_name, 1440);
      Cookie::queue('email', $request->email, 1440);
      Cookie::queue('birthday', $request->birthday, 1440);
      Cookie::queue('sex', $request->sex, 1440);

      if(!Participant::where('email', $request->email)->where('activity_id', $request->activity_id)->count()){
        $inscripto = Participant::create($request->all());
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.inscripto', ['activity' => $activity], function($message) use ($request, $activity)
          {
            $message
              ->from('noreply@festivalborges.com.ar', 'Festival Borges')
              ->to($request->email, $request->first_name. ' '.$request->last_name)
              ->subject('Inscripción exitosa a la charla de '.$activity->speaker);
          });
        // if ($now->diffInDays($activity->date)) {
          // if(Participant::where('email', $request->email)->count() > 1){
          //   $beautymail->send('emails.inscripto', ['activity' => $activity], function($message) use ($request, $activity)
          //   {
          //     $message
          //       ->from('noreply@festivalborges.com.ar', 'Festival Borges')
          //       ->to($request->email, $request->first_name. ' '.$request->last_name)
          //       ->subject('Inscripción exitosa a la charla de '.$activity->speaker);
          //   });
          // } else {
          //   $beautymail->send('emails.welcome', ['activity' => $activity], function($message) use ($request)
          //   {
          //     $message
          //       ->from('noreply@festivalborges.com.ar', 'Festival Borges')
          //       ->to($request->email, $request->first_name. ' '.$request->last_name)
          //       ->subject('¡Bienvenido! - Inscripción exitosa');
          //   });
          // }
          // return redirect()->back()->with('status', 'Inscripción exitosa! Se le ha enviado el link de la charla a su casilla. Por favor revise su casilla de SPAM');
        // }

        // if ($activity->activity == "Charla") {
        //   $beautymail->send('emails.notification', ['activity' => $activity], function($message) use ($inscripto, $activity)
        //   {
        //     $message
        //       ->from('noreply@festivalborges.com.ar', 'Festival Borges')
        //       ->to($inscripto->email, $inscripto->first_name. ' '.$inscripto->last_name)
        //       ->subject('Festival Borges - Accedé a la charla de '.$activity->speaker);
        //   });
        // } else {
        //     $beautymail->send('emails.notification', ['activity' => $activity], function($message) use ($inscripto, $activity)
        //     {
        //       $message
        //         ->from('noreply@festivalborges.com.ar', 'Festival Borges')
        //         ->to($inscripto->email, $inscripto->first_name. ' '.$inscripto->last_name)
        //         ->subject('Festival Borges - Accedé al taller de '.$activity->speaker);
        //     });
        // }
        // $inscripto->notification = 1;
        // $inscripto->save();

        return redirect()->back()->with('status', 'Inscripción exitosa! Se le ha enviado el link de la charla a su casilla. Por favor revise su casilla de SPAM');
        
      }
      return redirect()->back()->with('error', 'Usted ya está inscripto en esta actividad');
    }
    public function verInscriptos()
    {
      $participants = Participant::all();
      $activities = Activity::orderBy('date', 'asc')->get();
      return view('inscriptos', compact('participants', 'activities'));
    }
    public function descargarInscriptos()
    {
      return Excel::download(new ParticipantsExport(Participant::all()), 'Participantes.'.Carbon::now()->format('d-m-Y').'.xlsx');
    }
    public function descargarInscriptosUnicos()
    {
      return Excel::download(new ParticipantsExport(Participant::distinct('email')->get()), 'Participantes.'.Carbon::now()->format('d-m-Y').'.xlsx');
    }
    public function landing()
    {
      $festival = Festival::where('active', true)->first();
      $oradores = Speaker::with('activities')->whereHas('activities', function (Builder $query) use($festival) {
        $query->where('activity','Charla')->where('festival_id', $festival->id);
      })->get()->sortBy(function($item){
        return array_search($item->location, ['España', 'Italia', 'Internacional', 'Local', 'Argentina']);
      });

      $talleristas = Speaker::with('activities')->whereHas('activities', function (Builder $query) use($festival) {
        $query->where('activity', 'like', 'Taller')->where('festival_id', $festival->id);
      })->get()->sortBy(function($item){
        return array_search($item->location, ['España', 'Italia', 'Internacional', 'Local', 'Argentina']);
      });
      // $experiencias = Speaker::where('festival_id', $festival->id)->whereHas('activities', function (Builder $query) use($festival) {
      //   $query->where('activity', 'like', 'Experiencia Borges')->where('festival_id', $festival->id);
      // })->get();
      return view('landing', compact('festival', 'oradores', 'talleristas'));
    }
    public function leer()
    {
      return view('festival.leer');
    }

}
