
app.controller('QuestionnaireController', function($scope, $http, $window, $timeout) {

    $scope.data = {};

    $scope.search = function(identificador) {
        $scope.setMessage();

        $http.get(object.url + '/' + identificador +'?name_current='+ object.name_current)
        .then(function(response) {
            if (response.status == 200) {
                let data = response.data.data;


                $('#body_temperature').html(data.body_temperature);
                $('#runny_nose').html(data.runny_nose ? 'SI' : 'NO');
                $('#sore_throat').html(data.sore_throat ? 'SI' : 'NO');
                $('#joint_pain').html(data.joint_pain ? 'SI' : 'NO');
                $('#cough').html(data.cough ? 'SI' : 'NO');
                $('#abdominal_pain').html(data.abdominal_pain ? 'SI' : 'NO');
                $('#headache').html(data.headache ? 'SI' : 'NO');
                $('#threw_up').html(data.threw_up ? 'SI' : 'NO');
                $('#diarrhea').html(data.diarrhea ? 'SI' : 'NO');
                $('#muscle_pain').html(data.muscle_pain ? 'SI' : 'NO');
                $('#general_weakness_and_malaise').html(data.general_weakness_and_malaise ? 'SI' : 'NO');
                $('#have_recently_traveled_abroad').html(data.have_recently_traveled_abroad ? 'SI' : 'NO');
                $('#have_a_chronic_disease').html(data.have_a_chronic_disease ? 'SI' : 'NO');
                $('#has_had_contact_with_covid').html(data.has_had_contact_with_covid ? 'SI' : 'NO');

                $('#companions').html('');
                if (data.companions.length > 0) {
                    let companion = "<hr><div class='col-md-12'><h4 class='bold'>Acompañantes</h4></div>";
                    data.companions.forEach(element => {
                        console.log(element);
                        companion += "<div class='col-md-6'><div class='form-group'><p class='bold margin-bottom-0'>Nombre:</p><h5 class='bold'>"+element.full_name+"</h5></div></div>";
                        let younger = element.younger ? 'SI' : 'NO';
                        companion += "<div class='col-md-6'><div class='form-group'><p class='bold margin-bottom-0'>Mayor de edad:</p><h5 class='bold'>"+ younger +"</h5></div></div>";
                    });

                    $('#companions').html(companion);
                }
                $('#modalQuestionnaireDetails').modal('show');
            }else {
                $scope.responseError({});
            }
        })
        .catch(function(response){
            $scope.responseError(response);
        });
    }

    $scope.responseSuccess = function( response ) {
        if (response.status === 200 && response.data.msg) {
            $('#modalSuccess .modal-body #feedbackText').html(response.data.msg);
            $('#modalSuccess').modal('show');
            $timeout( function(){
                window.location.href = object.url;
            }, 1500 );
        }else {
            $scope.responseError( {} );
        }
    }

    $scope.responseError = function(response, section){
        let msg = 'Error en el servidor o base de datos';
        if (response.status === 422) {
            if (angular.isUndefined(response.data.errors.length)) {
                for (var i in response.data.errors ) {
                    msg = response.data.errors[i][0]; //validation form request
                    break;
                }
            }
        }

        toastr.error(msg, 'Alerta!');
    }

    $scope.setMessage = function(){
        $scope.showMsg = 'none';
        $scope.msgError = '';
    }
});
