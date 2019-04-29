import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

Vue.component('InputField', require('./vendor/laravuebuilder/components/Fields/Tailwind/InputField.vue').default);
Vue.component('SelectField', require('./vendor/laravuebuilder/components/Fields/Tailwind/SelectField.vue').default);
Vue.component('TextareaField', require('./vendor/laravuebuilder/components/Fields/Tailwind/TextareaField.vue').default);
Vue.component('NumberField', require('./vendor/laravuebuilder/components/Fields/Tailwind/NumberField.vue').default);
Vue.component('CheckboxField', require('./vendor/laravuebuilder/components/Fields/Tailwind/CheckboxField.vue').default);
Vue.component('HiddenField', require('./vendor/laravuebuilder/components/Fields/Tailwind/HiddenField.vue').default);

Vue.component('loader', require('./vendor/laravuebuilder/components/Loader.vue').default);
Vue.component('progressButton', require('./vendor/laravuebuilder/components/ProgressButton').default);

Vue.component('FormField', require('./vendor/laravuebuilder/components/FormField.vue').default);
Vue.component('ResourcesIndex', require('./vendor/laravuebuilder/components/Resources/Index.vue').default);
Vue.component('DeleteLink', require('./vendor/laravuebuilder/components/DeleteLink.vue').default);


Vue.component('UploaderField', require('./vendor/laravuebuilder/components/Fields/Tailwind/UploaderField.vue').default);
Vue.component('DatetimeField', require('./vendor/laravuebuilder/components/Fields/Tailwind/DatetimeField.vue').default);

window.vueFormMessages = {

    httpCode: {
        "500": "An error occured. Please try later",
        "403": "Forbidden, you are not able to do this."
    }

}

window.VueAjaxErrorMessages = {
    500: "Internal server error, please try later.",
    403: "This action was forbidden.",
    422: "Your form was not correctly filled."
}

if(typeof Bus == "undefined") {
    window.Bus = new Vue();
}
window.MessageEvent = require('vue');
import Message from 'vue-m-message'
window.MessageEvent.use(Message)
window.MessageEvent = new Vue({
    methods: {
        sendMessage: function(options) {

            if(typeof options.http_code != "undefined") {
                if (typeof VueAjaxErrorMessages[options.http_code] != "undefined") {
                    var options = {
                        message: VueAjaxErrorMessages[options.http_code],
                        type: "error",
                        showClose: true
                    }
                } else {
                    var options = {
                        message: "Internal error.",
                        type: "error",
                        showClose: true
                    }
                }

            }
            this.$message(options);

        }
    }
});