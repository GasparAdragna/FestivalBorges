@extends('beautymail::templates.minty', ['color' => "#00929B"])

@section('content')

	@include('beautymail::templates.minty.contentStart', ['color' => "#00929B"])
        @if ($activity->activity == "Charla")
            <tr>
                <td class="title">
                    Te inscribiste con éxito a la charla online de {{$activity->speakerModel->first_name}} {{$activity->speakerModel->last_name}}
                </td>
            </tr>
        @else
            <tr>
                <td class="title">
                    Te inscribiste con éxito a el taller online de {{$activity->speakerModel->first_name}} {{$activity->speakerModel->last_name}}
                </td>
            </tr>
        @endif
        <tr>
			<td class="paragraph">
				{{$activity->activity}} de {{$activity->speakerModel->first_name}} {{$activity->speakerModel->last_name}}, "{{$activity->name}}"
			</td>
		</tr>
        <tr>
			<td class="paragraph">
				{{\Carbon\Carbon::parse($activity->date)->format('d')}} de Agosto {{\Carbon\Carbon::parse($activity->date)->format('H:i')}}hs de Argentina.
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
			<td class="paragraph">
				La charla será en vivo y podrás verla en nuestro canal de YouTube: "Festival Borges". Te enviaremos el link de la charla por mail cuando se acerque la fecha. Finalizada la conferencia, habrá un espacio para preguntas y respuestas.
			</td>
		<tr>
            <tr>
                <td class="paragraph">
                    ¡Te esperamos!
                </td>
            <tr>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
	@include('beautymail::templates.minty.contentEnd')

@stop