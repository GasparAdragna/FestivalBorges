@extends('beautymail::templates.minty', ['color' => "#00929B"])

@section('content')

	@include('beautymail::templates.minty.contentStart', ['color' => "#00929B"])
        <tr>
            <td class="title">
                {{$activity->name}}
            </td>
        </tr>
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        @if ($activity->activity == "Charla")
            <tr>
                <td class="paragraph">
                    Acá tenés el <a href="{{$activity->link}}" target="__blank">link</a> para entrar a la charla de {{$activity->speakerModel->first_name}} {{$activity->speakerModel->last_name}}
                </td>
                <td width="100%" height="10"></td>
            </tr>
        @else
            <tr>
                <td class="paragraph">
                    Acá tenés el <a href="{{$activity->link}}" target="__blank">link</a> para entrar al taller de {{$activity->speakerModel->first_name}} {{$activity->speakerModel->last_name}}
                </td>
            </tr>
        @endif
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
            <td class="paragraph">
                Si no podés entrar al link, copiá y pega esta dirección en tu navegador: {{$activity->link}}
            </td>
        </tr>
        <tr>
            <td width="100%" height="10"></td>
        </tr>
        <tr>
			<td class="paragraph">
				<b>{{\Carbon\Carbon::parse($activity->date)->format('d')}} de Agosto {{\Carbon\Carbon::parse($activity->date)->format('H:i')}}hs hora de Argentina.</b>
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
			<td class="paragraph">
				Desde el canal de YouTube vas a poder acceder a la charla en vivo y hacer las preguntas que quieras al final de la presentación.
			</td>
		</tr>
        <tr>
            <td width="100%" height="10"></td>
        </tr>
        <tr>
            <td class="paragraph">
                Gracias por ser parte del <b>Festival Borges</b>.
            </td>
        </tr>
        <tr>
            <td width="100%" height="10"></td>
        </tr>
        <tr>
            <td class="paragraph">
                ¡Te esperamos !
            </td>
        </tr>
        @if ($activity->activity == "Charla")
            <tr>
                <td>
                    @include('beautymail::templates.minty.button', ['text' => 'Accedé a la charla', 'link' => $activity->link])
                </td>
            </tr>
        @else
            <tr>
                <td>
                    @include('beautymail::templates.minty.button', ['text' => 'Accedé al taller', 'link' => $activity->link])
                </td>
        </tr>
        @endif

		<tr>
			<td width="100%" height="25"></td>
		</tr>
	@include('beautymail::templates.minty.contentEnd')

@stop