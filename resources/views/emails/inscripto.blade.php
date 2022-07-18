@extends('beautymail::templates.minty', ['color' => "#00929B"])

@section('content')

	@include('beautymail::templates.minty.contentStart', ['color' => "#00929B"])
        <tr>
            <td class="title">
                ¡Gracias por inscribirte en una actividad del <b>Festival Borges</b>!
            </td>
        </tr>
        <tr>
            <td class="paragraph">
                {{$activity->activity}} de {{$activity->speakerModel->first_name}} {{$activity->speakerModel->last_name}}, "{{$activity->name}}" - {{\Carbon\Carbon::parse($activity->date)->format('d')}} de Agosto {{\Carbon\Carbon::parse($activity->date)->format('H:i')}}hs de Argentina.
            </td>
        </tr>
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
			<td class="paragraph">
                El Festival tiene como objetivo analizar la obra de Borges y abrir puertas para que nuevos públicos puedan descubrir, acceder y disfrutar de sus textos. Contará con charlas y talleres, con acceso libre y gratuito, e inscripción previa.
			</td>
		</tr>
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
            <td class="paragraph">
                La segunda edición se llevará a cabo desde el lunes 8 al 12  de agosto, en el marco del 123° aniversario del nacimiento del autor.
            </td>
        </tr>
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
            <td class="paragraph">
                Se emitirá en vivo desde  el canal de YOUTUBE  del festival
            </td>
        </tr>
        <tr>
            <td class="paragraph">
                <a href="{{$activity->link}}" target="_blank">
                    <button type="button" class="btn btn-primary btn-lg mt-2">
                        {{$activity->link}}
                    </button>
                </a>
            </td>
        </tr>
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
            <td class="paragraph">
                El link que recibiste es para acceder a la actividad que te anotaste. El día de la charla tenés que clickear ahí para que puedas verla. 
            </td>
        </tr>
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
            <td class="paragraph">
                Nos apoya <a href="https://www.bajalibros.com/AR" target="_blank">www.Bajalibros.com</a> , una de las empresas más importante de libros digitales.
            </td>
        </tr>
        <tr>
            <td class="paragraph">
                Podés ingresar en la página y encontrar libros de Borges y sobre Borges en formato ebook.
            </td>
        </tr>
        <tr>
            <td class="paragraph">
                De Borges: <a href="https://www.bajalibros.com/AR/obra-completa-jorge-luis-borges-ebooks"> https://www.bajalibros.com/AR/obra-completa-jorge-luis-borges-ebooks</a>
            </td>
        </tr>
        <tr>
            <td class="paragraph">
                Sobre Borges: <a href="https://www.bajalibros.com/AR/ebooks-borges/page:1">https://www.bajalibros.com/AR/ebooks-borges/page:1</a>
            </td>
        </tr>
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
            <td class="paragraph">
                Te esperamos
            </td>
        </tr>
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
            <td class="paragraph">
                Gracias por ser parte del <b>Festival</b>
            </td>
        </tr>
        <tr>
			<td width="100%" height="10"></td>
		</tr>
        <tr>
            <td class="paragraph">
                Web: <a href="http://festivalborges.com.ar" target="_blank" rel="noopener noreferrer">www.festivalborges.com.ar</a>
            </td>
        </tr>
        <tr>
            <td class="paragraph">
                Facebook: <a href="https://www.facebook.com/FestivalBorges" target="_blank" rel="noopener noreferrer">FestivalBorges</a>
            </td>
        </tr>
        <tr>
            <td class="paragraph">
                Instagram: <a href="https://www.instagram.com/festivalborges" target="_blank" rel="noopener noreferrer">@festivalborges</a>
            </td>
        </tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
	@include('beautymail::templates.minty.contentEnd')

@stop