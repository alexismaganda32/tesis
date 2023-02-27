<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style type="text/css">
            body{
                font-family: Sans-serif;
                font-size: 12px;
                font-style: normal;
            }
            tr {
                display: table-row;
                vertical-align: inherit;
                border-color: inherit;
            }
            thead {
                display: table-header-group;
                vertical-align: middle;
                border-color: inherit;
            }
            table thead tr th {
                padding: 5px 10px 5px 10px;
            }
            table tbody tr td{
                padding: 3px 8px;
            }
            hr {
                border: 0;
                height: 1px;
                background: #BBB;
            }
            .label {
                font-size: 75%;
                font-weight: 600;
                color: #BBB;
            }
            .page-break {
                page-break-after: always;
            }
            .item-container{                
                display: block;
                text-align: justify;
                position: relative;
            }
            /*
            .item-container > div{
                display: inline-block;
            }
            */
            .list-content{
                margin-top:-15px;
                text-align:justify; 
                display: inline-block;
                left: 0;
                top: 0;            
                margin-left: 15px;
            }
            .item-container-sub{
                margin-left: 15px;
            }
            .list-content-sub{
                margin-left: 25px;
            }
            ol {
                margin: 0;
                padding: 0;
            }
            ol > li {
                counter-increment: section;
                display: block;
                /*margin: 0 0 0 30px;*/
                padding: 0 0 0 15px;
                page-break-inside: auto;
                text-align: justify;
                position: relative;                
            }

            ol > li:before {
                content: counters(section, ".") ".";
                display: block;
                position: absolute;
                left: 0;
            }
            ol-two-eng{
                counter-reset: count-two-eng 4;
            }
            ol-two-engli{
                list-style: none;
            }
            ol-two-eng li:before{
                counter-increment: count-two-eng;
                content: counter(count-two-eng, ".") ".";
                
            }
            @page { margin: 20px 50px; }
        </style>
    </head>
    <body>
        <script type="text/php">
            if (isset($pdf)) {
                $x = 500;
                $y = 800;
                $text = "Página {PAGE_NUM} De {PAGE_COUNT}";
                $font = null;
                $size = 9;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script>
        @php
            $path = storage_path('app/safe_control/signature');
        @endphp
        
        <main>
        @foreach ($safe_controls as $safe_control)
            {{ \App::setLocale($safe_control->language) }}
            <div style="text-align: center;">
                <img style="opacity: .5;" src="{{ storage_path('app/public/seadust.png') }}" height="40px"/>
            </div>            
            <div style="width:100%;">
                <div style="page-break-after: always;">
                <table style="width:100%;border-collapse: collapse;">
                    <tr><th></th><th></th></tr>
                    <tr>
                        <td style="border-right: 1px solid #00427d; width: 50%; vertical-align:initial;">
                            <div style="text-align: center;">
                                <h5 style="text-transform: uppercase; color: #00427d; margin-bottom:0px; padding:0px;">
                                    Declaración de entendimiento sobre Covid-19
                                </h5>
                                <p style="color:#BBB; margin:2px 0px;">(En la presente declaración al Hotel Seadust
                                    se le identificará como el “Hotel”)
                                </p>
                            </div>
                            <div style="display: block;">
                                <p style="text-align: justify; margin:0px;">
                                    Yo <strong style="text-decoration:underline;">{{ $safe_control->name }}</strong>, en este acto declaro que entiendo, acepto y reconozco lo siguiente:  
                                </p>
                                <div style="display: block; margin-top:10px;">
                                    <ol style="counter-reset: section;">
                                        <li>
                                            Los hu&eacute;spedes deben cumplir en todo momento con todos los protocolos de salud e higiene y las medidas de seguridad exigidas por el Hotel, la Organizaci&oacute;n Mundial de la Salud (OMS) y las autoridades de salud en M&eacute;xico, para prevenir la propagaci&oacute;n y transmisi&oacute;n del virus SARS-CoV-2.
                                        </li>
                                        <li>
                                            Adicionalmente, los hu&eacute;spedes deben manifestar al registrar su llegada al Hotel, si recientemente obtuvieron un resultado positivo en alguna prueba para detecci&oacute;n del virus SARS-CoV-2.
                                        </li>
                                        <li>
                                            Conforme a la regulaci&oacute;n de salud en M&eacute;xico, los hu&eacute;spedes deben informar al Director General del Hotel si en cualquier momento durante su estancia en el Hotel presentan uno o m&aacute;s de los s&iacute;ntomas que la Organizaci&oacute;n Mundial de la Salud (OMS) y las autoridades de salud en M&eacute;xico han asociado con un posible contagio del virus SARS-CoV-2, incluyendo pero no limitado a los siguientes:
                                            <ul>
                                                <li>Fiebre o escalofríos</li>
                                                <li>Tos seca o dolor de garganta</li>
                                                <li>Congestion o secresión nasal</li>
                                                <li>Falta de aire o dificultad para respirar</li>
                                                <li>Dolor o presión en el pecho</li>
                                                <li>Dolor de cabeza</li>
                                                <li>Dolor abdominal, muscular, cuerpo cortado</li>
                                                <li>Cansancio, fatiga o malestar</li>
                                                <li>Pérdida del gusto u olfato</li>
                                                <li>Náuseas o vómito</li>
                                                <li>Diarrea</li>
                                            </ul>
                                        </li>
                                        <li>
                                            Para los huéspedes que previo a su viaje de regreso requieran una prueba sobre el virus SARS-CoV-2 (virus que causa el COVID-19) y quieran realizársela en el Hotel, aplicará lo siguiente: 
                                            <div class="item-container">
                                                <div>
                                                    4.1.
                                                </div>
                                                <div class="list-content list-content-sub">
                                                    Todas las pruebas de SARS-CoV-2 que se apliquen en el Hotel serán subministradas por proveedores independientes y no asociados con el Hotel.
                                                </div>
                                            </div>                                            
                                            <div class="item-container">
                                                <div>
                                                    4.2.
                                                </div>
                                                <div class="list-content list-content-sub">
                                                    Los huéspedes deberán agendar sus citas para las pruebas (de PCR o antígenos) para asegurar la disponibilidad suficiente para poder tener los resultados antes de su fecha de salida. La mayoría de los países que solicitan una prueba del virus SARS-CoV-2 con resultado negativo para poder ingresar requieren que la muestra sea obtenida con no más de 72 horas de anticipación al vuelo de regreso, por lo que los huéspedes deberán tener esto en consideración cuando agenden su cita. SERÁ RESPONSABILIDAD EXCLUSIVA DEL HUÉSPED AGENDAR SU CITA PARA LA REALIZAR LA PRUEBA. FAVOR DE CONSIDERAR QUE LOS RESULTADOS DE LA PRUEBA PUDIERAN NO ESTAR DISPONIBLES A LA SALIDA DEL HUÉSPED SI LA CITA NO ES AGENDADA CON ANTICIPACIÓN, COMO SE MENCIONA EN ESTA DECLARACIÓN.
                                                </div>
                                            </div>                                            
                                            <div class="item-container">
                                                <div>
                                                    4.3.
                                                </div>
                                                <div class="list-content list-content-sub">
                                                    El Huésped deberá llegar con por lo menos 15 minutos de anticipación a su cita para la prueba del virus SARS-CoV-2 y portar su identificación oficial con fotografía (ej. pasaporte para todos los ciudadanos no mexicanos).                                            
                                                </div>
                                            </div>                                            
                                        </li>                                                                              
                                    </ol>                                                                                                            
                                </div>
                                                                          
                            </div>
                        </td>
                        <td style="vertical-align:initial;">
                            <div style="text-align: center;">
                                <h5 style="text-transform: uppercase; color: #00427d; margin-bottom:0px; padding:0px;">
                                    COVID-19 ACKNOWLEDGEMENT
                                </h5>
                                <p style="color:#BBB; margin:2px 0px;">
                                    (Under this Acknowledgement the Seadust Hotel will be referred as the “Hotel”)
                                </p>
                            </div>
                            <div style="display: block;">
                                <p style="text-align: justify; margin:0px;">
                                    I <strong style="text-decoration:underline;">{{ $safe_control->name }}</strong>, hereby understand, agree to, and acknowledge the following:
                                </p>
                                <div style="display: block; margin-top:10px;">
                                    <ol style="counter-reset: section;">
                                        <li>
                                            Guests must abide at all times with all health and hygiene protocols and safety measures mandated by the Hotel, the World Health Organization (WHO) and the applicable health authorities in Mexico, to prevent the spread and transmission of the SARS-CoV-2 virus.
                                        </li>
                                        <br>
                                        <li>
                                            Additionally, guests shall disclose at check-in if they have recently tested positive for the SARS-CoV-2 virus.
                                        </li>
                                        <br>
                                        <br>
                                        <li>
                                            Pursuant to applicable health regulations in Mexico, guests must disclose to the Hotel’s General Management if at any time during their stay at the Hotel they experience one or more symptoms which the World Health Organization (WHO) and health authorities in Mexico have linked with a possible contagion of the SARS-CoV-2 virus, including but not limited to:
                                            <ul>
                                                <li>fever or chills</li>
                                                <li>dry cough or sore throat</li>
                                                <li>congestion or runny nose </li>
                                                <li>shortness of breath or difficulty breathing</li>
                                                <li>chest pain or pressure</li>
                                                <li>headache</li>
                                                <li>abdominal, muscle and/or joint pain or body aches</li>
                                                <li>tiredness, fatigue or malaise </li>
                                                <li>loss of taste or smell</li>
                                                <li>nausea or vomiting</li>
                                                <li>diarrhea</li>
                                            </ul>
                                        <br>
                                        </li>
                                        <li>
                                            For any guests requiring a pre-departure SARS-CoV-2 (the virus that causes COVID-19) viral test for their return flight that wish to take the test at the Seadust Hotel (the “Hotel”), the following will apply:
                                            <div class="item-container">
                                                <div>
                                                    4.1.
                                                </div>
                                                <div class="list-content list-content-sub">
                                                    All SARS-CoV-2 tests performed at the Hotel will be administered by an independent service provider(s) that is not affiliated with the Hotel.
                                                </div>
                                            </div> 
                                            <div class="item-container">
                                                <div>
                                                    4.2.
                                                </div>
                                                <div class="list-content list-content-sub">                                                    
                                                    Guests must schedule a testing appointment (PCR or antigen) to ensure availability within a timeframe that would allow the test results to be ready before the guest’s scheduled departure. Most countries requiring a pre-departure negative SARS-CoV-2 viral test result for entry require that the specimen is collected no more than 72 hours from the guest’s scheduled departure flight so guests must take that into account when scheduling their appointment. IT IS THE GUEST’S SOLE RESPONSIBILITY TO SCHEDULE THE TESTING APPOINTMENT. PLEASE NOTE THAT TEST RESULTS MAY NOT BE AVAILABLE BY A GUEST’S SCHEDULED DEPARTURE IF THE APPOINTMENT IS NOT BOOKED IN ADVANCE AS SET FORTH IN THIS ACKNOWLEDGEMENT.
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="item-container">
                                                <div>
                                                    4.3.
                                                </div>
                                                <div class="list-content list-content-sub">
                                                    Guest’s must arrive at least 15 minutes prior to the scheduled SARS-CoV-2 testing appointment and bring government issued picture identification (e.g. passport for all non-Mexican citizens).                                            
                                                </div>
                                            </div>                                                                             
                                        </li>
                                    </ol>                                  
                                </div>
                                                                          
                            </div>
                        </td>
                    </tr>
                </table>
                    <div style="text-align: center; margin-top:5px;">
                        <img style="opacity: .5;" src="{{ storage_path('app/public/seadust-safe.png') }}" height="40px"/>
                    </div>
                </div>              
                <div style="text-align: center;">
                    <img style="opacity: .5;" src="{{ storage_path('app/public/seadust.png') }}" height="40px"/>
                </div>
                <div style="page-break-after: always;">                
                <table style="width:100%;border-collapse: collapse;">
                    <tr><th></th><th></th></tr>
                    <tr>
                        <td style="border-right: 1px solid #00427d; width: 50%; vertical-align:initial; padding-right:10px;">
                            <div class="item-container item-container-sub">
                                <div>
                                    4.4.
                                </div>
                                <div class="list-content list-content-sub">
                                    Cualquier información personal que sea obtenida con relación a la prueba del virus SARS-CoV-2 será administrada por el prestador de servicios independiente, no por el Hotel ni en representación de este último. Los huéspedes solo deberán proporcionar su nombre complete, número de habitación, fecha de salida y hora de prueba cuando agenden su cita para la prueba del virus SARS-CoV-2 en el Hotel.
                                </div>                                                                                                            
                            </div>
                            <br>
                            <div class="item-container">
                                <div>
                                    5.
                                </div>
                                <div class="list-content">                               
                                    Si un huésped da positivo en la prueba del virus SARS-CoV-2, dicho huésped y cualquier familiar o amigo que comparta la misma habitación será transferido inmediatamente a un área de cuarentena designada dentro del Hotel y deberá permanecer en cuarentena dentro de la habitación de huéspedes asignada. Si los huéspedes se niegan a ser trasladados a la sala de cuarentena, el Hotel estará por ley obligado a notificar a las correspondientes autoridades de salud.
                                </div>
                            </div>
                            <div class="item-container">
                                <div>
                                    6.
                                </div>
                                <div class="list-content">
                                    Cualquier huésped que haya adquirido la tarifa de "Cuarentena Seadust Safe" en el Hotel y deba ponerse en cuarentena como resultado de una prueba positiva del virus SARS-CoV-2, el Hotel le proporcionará alojamiento en una habitación, sin costo adicional, por hasta catorce (14) días (sólo alojamiento en habitación categoría estándar; no se incluyen cargos adicionales ni accesorios) de acuerdo con los términos y condiciones de dicho programa. La tarifa de "Cuarentena Seadust Safe" sólo se puede adquirir durante el proceso de registro de llegada al Hotel, a un costo de sólo USD$24.99 por persona, por estadía. Los menores de 15 años no necesitarán pagar una tarifa de "Cuarentena Seadust Safe".
                                </div> 
                            </div>
                            <div class="item-container">
                                <div>
                                    7.
                                </div>
                                <div class="list-content">
                                    Para cualquier huésped que no haya adquirido la tarifa de "Cuarentena Seadust Safe" y deba ponerse en cuarentena como resultado positivo de una prueba del virus SARS-CoV-2, el Hotel le ofrecerá alojamiento de cuarentena con un costo de USD$60.00 por persona, por noche, en habitación de ocupación doble (la tarifa variará dependiendo la ocupación que sea seleccionada).
                                </div>
                            </div>
                            <div class="item-container">
                                <div>
                                    8.
                                </div>
                                <div class="list-content">
                                Durante el periodo de cuarentena de cualquier cliente, aplicarán los términos siguientes: 
                                </div>   
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.1.
                                </div>
                                <div class="list-content list-content-sub">
                                    Los invitados, incluyendo familiares y amigos que se encuentren en la misma habitación (sin importar los resultados de la prueba del virus SARS-CoV-2) no podrán salir del cuarto de cuarentena asignado; en ningún momento ni por ningún motivo;
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.2.
                                </div>
                                <div class="list-content list-content-sub">
                                    El personal del Hotel no podrá ingresar al cuarto de cuarentena en ningún momento ni por ningún motivo;
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.3.
                                </div>
                                <div class="list-content list-content-sub">
                                    Los alimentos y bebidas serán entregados mediante servicio al cuarto, en la puerta de la habitación asignada; no se servirán ni entregarán bebidas alcohólicas a ningún cuarto de cuarentena y todas las bebidas con alcohol serán retiradas del frigobar de la habitación;                                     
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.4.
                                </div>
                                <div class="list-content list-content-sub">
                                    Las sábanas limpias se entregará en la puerta de la habitación asignada cada 3 días (los huéspedes deberán cambiarlas y tender las camas por ellos mismos);                                    
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.5.
                                </div>
                                <div class="list-content list-content-sub">
                                    No habrá servicio de limpieza del cuarto durante la cuarentena; 
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.6.
                                </div>
                                <div class="list-content list-content-sub">
                                    Cualquier servicio deberá solicitarse por teléfono; 
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.7.
                                </div>
                                <div class="list-content list-content-sub">
                                    Los huéspedes deberán portar cubre bocas en todo momento al recibir cualquier servicio en la puerta de la habitación;
                                </div>                                                                                                            
                            </div>
                        </td>
                        <td style="vertical-align:initial;">
                            <div class="item-container item-container-sub">
                                <div>
                                    4.4.
                                </div>
                                <div class="list-content list-content-sub">
                                    Any personal information collected in connection with the SARS-CoV-2 testing procedure is collected by the independent service provider(s) administering the test and not by or on behalf of the Hotel. Guests are only required to provide their full name, room number, departure date and requested testing time when scheduling a SARS-CoV-2 testing appointment at the Hotel.
                                </div>                                        
                            </div>
                            <br>
                            <br>
                            <div class="item-container">
                                <div>
                                    5.
                                </div>
                                <div class="list-content">                           
                                    If a guest tests positive for SARS-CoV-2, such guest and any accompanying family members or friends staying in the same room will be immediately transferred to a designated quarantine area within the Hotel and will be required to quarantine inside the assigned guest room. If guests refuse to be transferred to the quarantine room, the Hotel is required by law to notify the applicable health authorities.
                                </div>
                            </div>
                            <br>
                            <div class="item-container">
                                <div>
                                    6.
                                </div>
                                <div class="list-content">
                                    For any guest that has acquired the Hotel’s “Seadust Safe Quarantine” rate and is required to quarantine as a result of a positive SARS-CoV-2 test, the Hotel will provide guest room accommodations at no additional cost for up to fourteen (14) days (standard room category accommodations only; no incidental or ancillary charges included) in accordance with the terms and conditions of such program. This “Seadust Safe Quarantine” rate may be acquired just during the check-in at a cost of only US$24.99 per person per stay. Minors under the age of 15 years old do not need to pay a “Seadust Safe Quarantine” rate.                                    
                                </div> 
                            </div>
                            <br>
                            <br>
                            <div class="item-container">
                                <div>
                                    7.
                                </div>
                                <div class="list-content">
                                    For any guest that has not acquired the Hotel’s “Seadust Safe Quarantine” rate and is required to quarantine as a result of a positive SARS-CoV-2 test, the Hotel will offer a quarantine accommodation with a cost of per person, per night, room rate of US$60.00 based on double occupancy (rate will vary depending on selected occupancy).
                                </div>
                            </div>
                            <br>
                            <div class="item-container">
                                <div>
                                    8.
                                </div>
                                <div class="list-content">
                                    During any guest’s quarantine period, the following will apply: 
                                </div>   
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.1.
                                </div>
                                <div class="list-content list-content-sub">
                                    Guests, including any family members/friends within the same room (regardless of his or her SARS-CoV-2 test results, if any) may not leave the assigned quarantine room at any time nor for any reason; 
                                </div>                                                                                                            
                            </div>
                            <br>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.2.
                                </div>
                                <div class="list-content list-content-sub">
                                    Hotel staff is not allowed to enter the quarantine room at any time nor for any reason;
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.3.
                                </div>
                                <div class="list-content list-content-sub">
                                    Food and beverages will be delivered via room service at the front door of the assigned room; no alcoholic beverages will be served (delivered) to a quarantine room and all alcoholic beverages items will be removed from the mini-bar in the room;
                                </div>                                                                                                            
                            </div>
                            <br>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.4.
                                </div>
                                <div class="list-content list-content-sub">
                                    Clean bedroom linen will be delivered at the front door of the assigned room every 3 days (guests must change the room linen themselves);
                                </div>                                                                                                            
                            </div>
                            <br>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.5.
                                </div>
                                <div class="list-content list-content-sub">
                                    There will be no room cleaning service during the quarantine period; 
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.6.
                                </div>
                                <div class="list-content list-content-sub">
                                    All service requests must be made by telephone; 
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.7.
                                </div>
                                <div class="list-content list-content-sub">
                                    Guests must wear face masks at all times when receiving any service at the front door of the room;
                                </div>                                                                                                            
                            </div>
                        </td>
                    </tr>
                </table>
                <div style="text-align: center; margin-top:20px;">
                    <img style="opacity: .5;" src="{{ storage_path('app/public/seadust-safe.png') }}" height="40px"/>
                </div>
                </div>
                <div style="text-align: center;">
                    <img style="opacity: .5;" src="{{ storage_path('app/public/seadust.png') }}" height="40px"/>
                </div>
                <table style="width:100%;border-collapse: collapse; ">
                    <tr><th></th><th></th></tr>
                    <tr>
                        <td style="border-right: 1px solid #00427d; border-bottom: 1px solid #00427d; width: 50%; vertical-align:initial; padding-right:10px;">
                            <div class="item-container item-container-sub">
                                <div>
                                    8.8.
                                </div>
                                <div class="list-content list-content-sub">
                                    Las consultas médicas serán realizadas vía telefónica por el servicio médico disponible en el Hotel, o en la habitación de cuarentena cuando sea necesario; y
                                </div>                                                                                                            
                            </div>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.9.
                                </div>
                                <div class="list-content list-content-sub">
                                    De ser necesario trasladar a un huésped de una habitación de cuarentena hacia fuera del Hotel, un equipo de traslado del Hotel lo acompañará, junto con los familiares o amigos que lo acompañen; desde la habitación de cuarentena hasta la salida del Hotel. El Hotel deberá notificar a las autoridades sanitarias según sea el caso.
                                </div>                                                                                                            
                            </div>
                            <div>
                                Para mayor información, por favor contacte al Director General del Hotel, o visite:
                                <ul>
                                    <li>
                                        https://www.who.int/emergencies/diseases/novel-coronavirus-2019
                                    </li>
                                    <li>
                                        www.coronavirus.gob.mx                             
                                    </li>
                                </ul> 
                            </div>
                            <div>
                                Por favor seleccione una de las opciones siguientes, de acuerdo a sus propios intereses:                                 
                                <div>     
                                    <br>
                                    @if ($safe_control->accept_terms)
                                    <input style="color:#00427d;" checked id="check_ok" type="checkbox">                                    
                                    @else                                                            
                                    <input id="check_ok" type="checkbox">                                 
                                    @endif
                                    <div style="margin-top:-3px; display:inline-block;">
                                        <label for="check_ok">Deseo adquirir la tarifa “Cuarentena Seadust Safe”.</label>
                                    </div>                                    
                                </div>
                                <div>                                   
                                    @if ($safe_control->accept_terms)
                                    <input id="check_no" type="checkbox">
                                    @else
                                    <input style="color:#00427d;" checked id="check_no" type="checkbox">
                                    @endif 
                                    <div style="margin-top:-2px; margin-right:20px; display:inline-block; text-align:justify;">
                                        <label for="check_ok">
                                            No deseo adquirir la tarifa “Cuarentena Seadust Safe” y estoy de acuerdo en pagar la tarifa de hospedaje referida en el apartado 7 de este documento; en caso de requerir permanecer en cuarentena en el Hotel.
                                        </label>
                                    </div>                                    
                                </div>
                            </div>                            
                            <div>
                                Por favor firme confirmando que ha leído, entendido completamente y está de acuerdo con todos los términos de este documento. 
                            </div>
                            <br>
                        </td>
                        <td style="vertical-align:initial; border-bottom: 1px solid #00427d;">
                            <div class="item-container item-container-sub">
                                <div>
                                    8.8.
                                </div>
                                <div class="list-content list-content-sub">
                                    Medical consultation will be performed by the medical service available at the Hotel via telephone or at the quarantine room if needed; and
                                </div>                                                                                                            
                            </div>
                            <br>
                            <div class="item-container item-container-sub">
                                <div>
                                    8.9.
                                </div>
                                <div class="list-content list-content-sub">
                                    If there is a need to transfer a guest within a quarantine room outside of the Hotel, a transfer team from the Hotel will accompany the guest and any accompanying family members/friends from the quarantine room to the Hotel exit. The Hotel shall make any required notifications to the health authorities as the case may be.
                                </div>                                                                                                            
                            </div>
                            <div>
                                For more information, please contact the Hotel’s General Management or visit:
                                <ul>
                                    <li>
                                        https://www.who.int/emergencies/diseases/novel-coronavirus-2019
                                    </li>
                                    <li>
                                        www.coronavirus.gob.mx                             
                                    </li>
                                </ul> 
                            </div>
                            <div>
                                Please check the applicable box below, according to your own interest:
                                <div>     
                                    <br>    
                                    @if ($safe_control->accept_terms)
                                    <input style="color:#00427d;" checked id="check_ok" type="checkbox">                                    
                                    @else                                                            
                                    <input id="check_ok" type="checkbox">                                 
                                    @endif                                                               
                                    <div style="margin-top:-2px; display:inline-block;">
                                        <label for="check_ok">I wish to acquire the Hotel’s “Seadust Safe Quarantine” rate.</label>
                                    </div>                                    
                                </div>
                                <div style="margin-top:-10px;"> 
                                    @if ($safe_control->accept_terms)
                                    <input id="check_no" type="checkbox">
                                    @else
                                    <input style="color:#00427d;" checked id="check_no" type="checkbox">
                                    @endif                                                                    
                                    <div style="margin-top:-2px; display:inline-block; text-align:justify;">
                                        <label for="check_no">
                                            I wish to decline to acquire the Hotel’s “Seadust Safe Quarantine” rate and agree to pay the accommodation rate stated in section 7 above; if required to quarantine at the Hotel.
                                        </label>
                                    </div>                                    
                                </div>
                            </div>                            
                            <div style="margin-top:-5px;">
                                Please sign confirming that you have read, fully understood, and agree with all of the terms above.
                            </div>
                            <br>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <p style="float: right;">@lang('liability.safe_format_location')</p>
            <br>
            <div style="width: 100%;margin-top:50px; white-space: nowrap; display:block;">
                <div style="width: 45%; display:inline-block; float:left;">
                    <p style="text-align: center;">{{ $safe_control->name }}</p>
                    <div style="width: 100%; border-bottom: 1px solid #00427d;">

                    </div>    
                    <p style="padding-top:2px;padding-left:10px;"><strong>@lang('liability.guest_name')</strong></p>                    
                </div>
                <div style="width: 45%; display:inline-block; float:right;">
                    <p style="text-align: center;">{{ $safe_control->created_at }}</p>
                    <div style="width: 100%; border-bottom: 1px solid #00427d;">

                    </div>
                    <p style="padding-top:2px; padding-left:10px;"><strong>@lang('liability.date')</strong></p>                    
                </div>                
            </div>
            <br>
            <br>
            <br>            
            <div style="padding-top:50px;width: 100%;margin-top:50px; white-space: nowrap; display:block;">                
                <img style="padding-left:20%;"  src="{{ storage_path('app/safe_control/signature/'.$safe_control->signature_img) }}" alt="signature">
                <div style="width: 50%; position:relative; margin: 0 auto;">                                       
                    <div style="width: 100%; border-bottom: 1px solid #00427d;">
                    </div>    
                    <p style="padding-top:2px; padding-left:10px;"><strong>@lang('liability.guest_signature')</strong></p>    
                </div>              
            </div>
            <br><br><br><br><br><br><br><br><br>
            <div style="text-align: center;">
                <img style="opacity: .5;" src="{{ storage_path('app/public/seadust-safe.png') }}" height="40px"/>
            </div>
            @if (!$loop->last)
                <div class="page-break"></div>
            @endif
        @endforeach
        </main>
    </body>
</html>
