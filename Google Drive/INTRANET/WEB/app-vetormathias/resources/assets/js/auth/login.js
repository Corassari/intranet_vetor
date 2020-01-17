require('../bootstrap');

import Vue from 'vue'
import CxltToastr from 'cxlt-vue2-toastr'

//configuracao TOASTR
var toastrConfigs = {
    position: 'top right',
    showDuration: 2000,
    showMethod: 'fadeIn',
    timeOut: 5000
};

Vue.use(CxltToastr, toastrConfigs)

new Vue({
    el: '#appLogin',
    data: {
        inputEmail: '',
        inputPass: '',
        btnLogin: 'Entrar'
    },
    methods: {
        login: function(e) {
            const vw = this;
            vw.btnLogin = '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Aguarde...'
                //consulta API
            axios.post('/auth/login', {
                mail: this.inputEmail,
                pass: this.inputPass
            }).then(function(resp) {
                var _response = resp.data
                if (_response.result == true) {
                    vw.$toast.success({
                            title: 'Login',
                            message: _response.msg
                        })
                        //redirect
                    window.location.href = "/"
                } else {
                    vw.$toast.error({
                        title: 'Dados incorretos',
                        message: _response.msg
                    })
                }
                vw.btnLogin = 'Entrar'
            }).catch(function(error) {
                console.log('error -----------')
                console.log(error)
                console.log(error.response)
                    // handle error
                var _msgError = error
                vw.$toast.error({
                    title: 'Ops',
                    message: _msgError
                })
            })
            e.preventDefault();
        }
    }
})