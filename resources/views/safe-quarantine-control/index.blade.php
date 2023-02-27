@extends('layouts.app')

@section('script')
    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('input[id="fechas"]').daterangepicker({
                opens: 'left',
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                },
                language:'es'
            });
            $('input[id="fechas"]').on('cancel.daterangepicker', function(ev, picker) {
                $('input[id="fechas"]').val('');
                $('input[name="fecha_inicio"]').val('');
                $('input[name="fecha_fin"]').val('');
            });
            $('input[id="fechas"]').on('apply.daterangepicker', function(ev, picker) {
                $('input[name="fecha_inicio"]').val(picker.startDate.format('DD-MM-YYYY'));
                $('input[name="fecha_fin"]').val(picker.endDate.format('DD-MM-YYYY'));
                $(this).val(picker.startDate.format('DD-MM-YYYY') +' - '+ picker.endDate.format('DD-MM-YYYY'));
            });
            @if(\Session::get('fecha_inicio') && \Session::get('fecha_fin'))
                $('input[id="fechas"]').val('{{ \Session::get('fecha_inicio') }}  -  {{ \Session::get('fecha_fin') }}');
            @endif
        });
		var object = {
            url : "{{ url('questionnaire') }}",
            name_current : "{{ Route::currentRouteName() }}",
        };
    </script>
	<script src="{{ asset('js/Controllers/QuestionnaireController.js') }}"></script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('title', 'Safe Quarantine')

@section('content')
	@php
	    $count = $control_data->firstItem();
	@endphp
	@include('shared.loadingView')

	<div class="row view" ng-controller="QuestionnaireController">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="elipsis">
						<strong>Declaración de entendimiento sobre COVID-19</strong>
					</span>
				</div>
				<div class="panel-body">
                    <div class="row">
                        <form action="{{ route('safe-quarantine-control.index') }}" method="GET" novalidate id="formSearch">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <div class="fancy-form">
                                        <i class="fa fa-user"></i>
                                        <input class="form-control" type="text" name="name" placeholder="Buscar por nombre" value="{{ \Session::get('name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <div class='input-group'>
                                        <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                        <input type="text" class="form-control" id="fechas" placeholder="Buscar por fechas">
                                        <input type="hidden" name="fecha_inicio" value="{{ \Session::get('fecha_inicio') }}">
                                        <input type="hidden" name="fecha_fin" value="{{ \Session::get('fecha_fin') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i> Buscar</button>
                                <a class="btn btn-success btn-sm hidden" href="{{ route('questionnaire.excel', [
                                    'name_current' => Route::currentRouteName(),
                                ]) }}"><i class="fas fa-file-excel"></i> Exportar Excel</a>
                                <a class="btn btn-danger btn-sm hidden" href="{{ route('questionnaire.pdf', [
                                    'name_current' => Route::currentRouteName(),
                                ]) }}"><i class="fas fa-file-excel"></i> Exportar PDF</a>
                            </div>
                        </form>
                    </div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center"><i class="fas fa-cogs"></i></th>
									<th>#</th>
                                    <th># Folio</th>
                                    <th># Habitación</th>
									<th>Nombre completo</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>En caso de emergencia</th>                                    
									<th><i class="far fa-calendar-alt"></i> Registrado</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($control_data as $control)
								<tr>
									<td class="actions text-center">
                                        <a href="{{ route('safe-quarantine-control.pdf', [
                                            'name_current' => Route::currentRouteName(),
                                            'safe_control' => $control->id
                                        ]) }}" class="text-danger margin-right-6" data-toggle="tooltip" data-placement="bottom" title="Exportar PDF">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                        <a class="text-primary margin-right-6 hidden" data-toggle="tooltip" data-placement="bottom" title="Visualizar" ng-click="search({{ $control->id }})">
                                            <i class="fas fa-eye"></i>
                                        </a>
									</td>
									<td> {{ $count++ }} </td>
                                    <td> {{ $control->rsv_folio }} </td>
                                    <td> {{ $control->rsv_room }} </td>
									<td> {{ $control->name }} </td>
                                    <td> {{ $control->email }} </td>
                                    <td> {{ $control->phone }} </td>
                                    <td> {{ $control->data_emergency }}</td>
									<td> {{ $control->created_at }} </td>
								</tr>
								@empty
								<tr>
									<td colspan="4" style="color: red;"> SIN REGISTROS </td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
					<div class="text-left">
						{{ $control_data->appends([
                            'name' => \Session::get('name'),
                            'fecha_inicio' => \Session::get('fecha_inicio'),
                            'fecha_fin' => \Session::get('fecha_fin'),
                        ])->links() }}
					</div>
				</div>
			</div>
		</div>
    </div>

    <div class="modal fade" id="modalQuestionnaireDetails" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Detalles</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Temperatura corporal</p>
                                <h5 class="bold" id="body_temperature"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Secreción nasal</p>
                                <h5 class="bold" id="runny_nose"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Dolor de garganta</p>
                                <h5 class="bold" id="sore_throat"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Dolor de articulaciones</p>
                                <h5 class="bold" id="joint_pain"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Tos</p>
                                <h5 class="bold" id="cough"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Dolor abdominal</p>
                                <h5 class="bold" id="abdominal_pain"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Dolor de cabeza</p>
                                <h5 class="bold" id="headache"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Vómito</p>
                                <h5 class="bold" id="threw_up"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Diarrea</p>
                                <h5 class="bold" id="diarrhea"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Dolor muscular</p>
                                <h5 class="bold" id="muscle_pain"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">Debilidad y malestar en general</p>
                                <h5 class="bold" id="general_weakness_and_malaise"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">¿Ha viajado recientemente al extranjero o en el interior de la republica antes de su vista con nosotros?</p>
                                <h5 class="bold" id="have_recently_traveled_abroad"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">¿Padece alguna enfermedad crónica, tal como hipertensión, diabetes o cáncer?</p>
                                <h5 class="bold" id="have_a_chronic_disease"></h5>
                            </div>
                            <div class="form-group">
                                <p class="bold margin-bottom-0">¿Ha tenido contacto con alguna persona sospechosa o confirmada de COVID-19?</p>
                                <h5 class="bold" id="has_had_contact_with_covid"></h5>
                            </div>
                        </div>
                        <div id="companions">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
