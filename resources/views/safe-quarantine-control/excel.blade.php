<table>
    <thead>
    <tr>
        <th>Nombre completo</th>
        <th>Correo electrónico</th>
        <th>Edad</th>
        <th>Nacionalidad</th>
        <th>Telefono</th>
        <th>Temperatura corporal</th>
        <th>Secreción nasal</th>
        <th>Dolor de garganta</th>
        <th>Dolor de articulaciones</th>
        <th>Tos</th>
        <th>Dolor abdominal</th>
        <th>Dolor de cabeza</th>
        <th>Vómito</th>
        <th>Diarrea</th>
        <th>Dolor muscular</th>
        <th>Debilidad y malestar en general</th>
        <th>¿Ha viajado recientemente al extranjero o en el interior de la republica antes de su vista con nosotros?</th>
        <th>¿Padece alguna enfermedad crónica, tal como hipertensión, diabetes o cáncer?</th>
        <th>¿Ha tenido contacto con alguna persona sospechosa o confirmada de COVID-19?</th>
        <th>Acompañantes</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($questionnaires as $questionnaire)
            <tr>
                <td>{{ $questionnaire->full_name }}</td>
                <td>{{ $questionnaire->email }}</td>
                <td>{{ $questionnaire->age }}</td>
                <td>{{ $questionnaire->nationality }}</td>
                <td>{{ $questionnaire->telephone }}</td>
                <td>{{ $questionnaire->body_temperature }}</td>
                <td>{{ $questionnaire->runny_nose ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->sore_throat ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->joint_pain ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->cough ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->abdominal_pain ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->headache ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->threw_up ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->diarrhea ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->muscle_pain ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->general_weakness_and_malaise ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->have_recently_traveled_abroad ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->have_a_chronic_disease ? 'SI' : 'NO' }}</td>
                <td>{{ $questionnaire->has_had_contact_with_covid ? 'SI' : 'NO' }}</td>
                <td>
                    @if (count($questionnaire->companions) > 0)
                        @foreach ($questionnaire->companions as $keyc => $companion)
                            <h3>Acompañante <strong>#{{ $keyc + 1 }}</strong></h3> <br>
                            Nombre completo : {{ $companion->full_name }} <br>
                            Mayor de edad : {{ $companion->younger ? 'SI' : 'NO' }} <br>
                        @endforeach
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
