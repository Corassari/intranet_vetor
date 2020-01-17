
<template>
  <div class="p-0 bg-secondary">
    <form class>
      <div class="row">
        <field-component v-for="field in fields" :data-field="field" :key="field.id" />
      </div>
    </form>
    <table-component :url="urlTable" />
  </div>
</template>

<script>
import TableComponent from "../../components/TableComponent.vue";
import FieldComponent from "../../components/FieldComponent.vue";

export default {
  components: {
    TableComponent,
    FieldComponent
  },
  data() {
    return {
      urlTable: "",
      fields: [
        {
          id: 0,
          name: "C7_NUM",
          label: "Pedido",
          placeholder: "Pedido de compra",
          sizeCol: "2",
          class: {
            alternative: true,
            size: "sm"
          }
        },
        {
          id: 0,
          name: "C7_CONAPRO",
          label: "Status",
          placeholder: "",
          sizeCol: "3",
          class: {
            alternative: true,
            size: "sm"
          }
        }
      ]
    };
  }
};
</script>