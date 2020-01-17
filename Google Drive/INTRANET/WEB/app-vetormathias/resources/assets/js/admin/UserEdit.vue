<template>
  <form-component
    :form-config="form"
    :form-fields="field"
    :form-button="button"
  ></form-component>
</template>
<script>
import FormComponent from "../components/FormComponent.vue";

export default {
  components: {
    FormComponent
  },
  props: ["param","data"],
  data() {
    return {
      form: {
        title: "Editar Usuários",
        methodAction: "put",
        methodData: "post",
        urlAction: "/admin/user/update/" + this.param,
        urlData: "/admin/user/form-edit/"+ this.param,
        data:this.data
      },
      button: [
        {
          text: "Cancelar",
          class: "btn btn-sm btn-danger",
          type: "reset"
        },
        {
          text: "Editar",
          class: "btn btn-sm btn-outline-warning",
          type: "submit"
        }
      ],
      field: [
        {
          id: 0,
          sizeCol: "8",
          size:'sm',
          placeholder: "Nome",
          type: "text",
          label: "Nome",
          name: "USR_NAME",
          value: "Felipe Lima",
          class: "",
          feedback: ""
        },
        {
          id: 1,
          sizeCol:'4',
          size: "sm",
          placeholder: "Login",
          type: "text",
          label: "login",
          name: "USR_LOGIN",
          value: "",
          class: "",
          feedback: ""
        },
        {
          id: 2,
          sizeCol:"12",
          size: "sm",
          placeholder: "Digite sua conta de e-mail",
          type: "email",
          label: "E-mail",
          name: "USR_MAIL",
          value: "",
          class: "",
          feedback: ""
        },        
      ]
    };
  }
};
</script>
