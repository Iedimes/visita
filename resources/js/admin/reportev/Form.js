import AppForm from '../app-components/Form/AppForm';

Vue.component('reportev-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                inicio:  '' ,
                fin:  '' ,
                
            }
        }
    }

});