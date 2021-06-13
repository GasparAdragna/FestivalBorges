<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use Mail;


class FestivalController extends Controller
{
    public function contacto(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255|string',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:65535'
        ]);
        // $recaptcha = $request->input('g-recaptcha-response');
        // $url = 'https://www.google.com/recaptcha/api/siteverify';
        // $data = array(
        //   'secret' => '6LdkjtgZAAAAAJD7PszRUyz8oud8_qOuE6o6_nai',
        //   'response' => $recaptcha
        // );
        // $options = array(
        //   'http' => array (
        //     'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        //     'method' => 'POST',
        //     'content' => http_build_query($data)
        //   )
        // );
        // $context  = stream_context_create($options);
        // $verify = file_get_contents($url, false, $context);
        // $captcha_success = json_decode($verify);
        // if ($captcha_success->success) {
            Contact::create($request->all());

            $data = array('consulta'=>$request);
            //estilobricabrac@hotmail.com
            Mail::send('consulta', $data, function($message){
            $message->to('gaspar.jac@hotmail.com', 'Festival Borges')->subject
                ('¡Nueva consulta en el sitio!');
            $message->from('noreply@festivalborges.com.ar','Festival Borges');
            });

            return redirect()->back()->with('status', 'Se envió correctamente la consulta');
        // } else {
        //   return redirect()->back()->with('error', 'No se pudo enviar su consulta. Intente nuevamente');
        // }
    }
}
