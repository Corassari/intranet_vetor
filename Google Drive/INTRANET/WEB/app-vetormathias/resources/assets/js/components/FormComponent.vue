<template>
  <form id="formComponent" @submit="send" class="needs-validation">
    <h6 v-if="formConfig.title" class="heading-small text-muted mb-2">{{ formConfig.title }}</h6>
    <div class="form-row">
      <field-component v-for="form in formFields" :key="form.id" :dataField="form"></field-component>
    </div>
    <br />
    <div class="text-right">
      <button-component
        v-for="(btn,i) in formButton"
        :key="i"
        :button-text="btn.text"
        :button-type="btn.type"
        :button-class="btn.class"
      ></button-component>
    </div>
  </form>
</template>

<script>
import FieldComponent from "../components/FieldComponent.vue";
import ButtonComponent from "../components/ButtonComponent.vue";

export default {
  components: {
    FieldComponent,
    ButtonComponent
  },
  props: {
    formFields: {
      type: Array
    },
    formButton: {
      type: Array
    },
    formConfig: {
      type: Object
    }
  },
  mounted() {
    this.loadFormData();
  },
  methods: {
    getFormData() {
      return $("#formComponent").serialize();
    },
    loadFormData() {
      var vw = this;
      var _fieldSend = this.formFields;
      axios({
        method: this.formConfig.methodData,
        url: this.formConfig.urlData,
        data: this.getFormData()
      })
        .then(function(response) {
          //clear feedback fields
          _fieldSend.forEach(element => {
            vw.formFields[element.id].value = response.data[element.name];
          });
        })
        .catch(function(error) {
          console.log(error.response);
        });
    },
    setFieldErrors(resp) {
      var vw = this;
      var _status = "";
      var _fieldResponse = {};
      var _fieldSend = this.formFields;

      if (resp.response == undefined) {
        //clear feedback fields
        _fieldSend.forEach(element => {
          vw.formFields[element.id].feedback = false;
        });
      } else {
        _status = resp.response.status;
        if (_status == 422) {
          //message toasr of error
          vw.$toast.error({
            title: "Campos Obrigatórios",
            message: "Alguns campos são obrigatórios"
          });

          //listar campos do response funcao nativa LARAVEL
          _fieldResponse = resp.response.data.errors;

          //listar campos
          Object.keys(_fieldResponse).forEach(function(fieldValidate, index) {
            _fieldSend.forEach(element => {
              if (vw.formFields[element.id].name == fieldValidate) {
                vw.formFields[element.id].feedback = Object.values(
                  _fieldResponse
                )[index][0];
              }
            });
          });
        } else {
          console.log(resp.response)
          //message toasr of error
          vw.$toast.error({
            title: "Error",
            message: resp.response.message
          });
        }
      }
    },
    send(e) {
      var vw = this;

      axios({
        method: this.formConfig.methodAction,
        url: this.formConfig.urlAction,
        data: this.getFormData()
      })
        .then(function(response) {
          //console.log(response);
          vw.$toast.error({
            title: response.title,
            message: response.message
          });
          //vw.setFieldErrors(response);
        })
        .catch(function(error) {
          vw.setFieldErrors(error);
        });

      e.preventDefault();
    }
  }
};
</script>