<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Nacimiento</th>
        <th>Sexo</th>
        <th>Pais</th>
        <th>Actividad</th>
    </tr>
    </thead>
    <tbody>
    @foreach($participants as $participant)
        <tr>
            <td>{{ $participant->first_name }} {{$participant->last_name}}</td>
            <td>{{ $participant->email }}</td>
            <td>{{ $participant->birthday }}</td>
            <td>{{$participant->sex}}</td>
            <td>{{$participant->country}}</td>
            <td>{{$participant->activity->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>