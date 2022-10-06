import AppForm from '../app-components/Form/AppForm';

Vue.component('visit-form', {
    mixins: [AppForm],
    props:['state','dependency'],

    data: function() {
        return {

                show: false,
                id: '',

            form: {
                CI:  '' ,
                Full_Name:  '' ,
                First_Surname:  '' ,
                Second_Surname:  '' ,
                Married_Surname:  '' ,
                First_Name:  '' ,
                Second_Name:  '' ,
                Reason:  '' ,
                Observation:  '' ,
                Entry_Datetime:  '' ,
                Exit_Datetime:  '' ,
                state:  '' ,
                dependency:  '' ,

            }
        }


    },

    methods: {
        updateCoordinates(location) {
            this.coordinates = {
                lat: location.latLng.lat(),
                lng: location.latLng.lng()
            };
            this.center = this.coordinates;
            this.form.lat = this.coordinates.lat.toString();
            this.form.lon = this.coordinates.lng.toString();
            //this.form.casa = "demo";
            //console.log(this.tipos);
        },
        findData: function() {
            axios
                .get(this.action + "/" + this.form.CI + "/identificaciones")
                .then(response => {
                    var data = response.data.message;
                    console.log(data);
                    if (data.error) {
                        this.$modal.show("dialog", {
                            title: "Atención!",
                            text: data.error,
                            buttons: [{ title: "Ok" }]
                        });
                    }

                    this.form.Full_Name = data.nombres;
                    this.form.First_Surname = data.apellido;
                    /*this.form.gender = data.sexo;
                    this.form.marital_status = data.estadoCivil;
                    this.form.nationality = data.nacionalidadBean;
                    var date = new Date(data.fechNacim);
                    this.form.birthdate = date.toISOString().split("T")[0];*/
                });
        },

        onSuccess: function onSuccess(data) {
            this.$modal.show('dialog', {
                title: 'Importante!',
                text: 'Visita N° <strong>'+ data.visit + '</strong> registrada correctamente!!!',
                buttons: [
                    //{ title: 'No, cancel.' },
                    {
                        title: '<span class="btn-dialog btn-primary">Aceptar.<span>',
                        handler: () => {
                            this.$modal.hide('dialog');
                            window.location.replace(data.redirect);
                            console.log('deleted');

                        }
                    }
                ]
            });
            this.submiting = false;
            console.log(data);
            //this.form.ci = ''
            //this.form.name = ''
            //this.form.user = ''
            //this.form.dependency = ''
            //this.form.fone = ''
            //this.form.problem = ''
            //this.show = true
            //this.$notify({ type: 'success', title: 'IMPORTANTE',position:"top center", width:"200px", duration: 10000, text: 'El ticket '+data.ticket+' ha sido creado correctamente!!!'});
            if (data.redirect) {

              console.log(data.message);
              //this.show = true
              this.visit = data.id
            }
          },



    },





});



