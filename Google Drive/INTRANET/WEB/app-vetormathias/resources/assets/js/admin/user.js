require('../bootstrap');

import Vue from 'vue'
import User from '../admin/User.vue';
import UserEdit from './UserEdit.vue';
import CxltToastr from 'cxlt-vue2-toastr'

Vue.use(CxltToastr)


var e = ['#userList', '#userEditForm'];
var _appRender = null;
var _element = null;
var _id = 2;
var _attrs = {};

/**
 * @description validating current page elements
 * @author Felipe Corassari
 * @since 05/01/2019
 */

e.forEach(function(element) {
    if ($(element).length > 0) {
        switch (element) {
            case '#userList':
                _element = element;
                _appRender = User;
                break;

                /*case '#userEditForm':
                    _element = element;
                    _appRender = UserEdit;
                    _attrs = {
                        attrs: {
                            param: _id
                        }
                    }
                    break;*/

        }
    }
})

/**
 * @description elements of pages used
 * @author Felipe Corassari
 * @since 05/01/2019
 */
new Vue({
    el: _element,
    render: h => h(_appRender, _attrs)
});