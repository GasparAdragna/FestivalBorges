<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Activity;
use Mail;


class FestivalController extends Controller
{
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
    public function agregarActividad(Request $request)
    {
      $validate = $request->validate([
        'name' => 'required|string',
        'speaker' => 'required|string',
        'description' => 'required|string',
        'date' => 'required|date',
        'activity' => 'required|string'
      ]);
      Activity::create($request->all());
      return redirect()->back()->with('status', 'Se creó correctamente la actividad');
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
    public function porDia($dia)
    {
      $actividades = Activity::whereDay('date', $dia)->get();
      return view('pordia', compact('actividades', 'dia'));
    }

}
