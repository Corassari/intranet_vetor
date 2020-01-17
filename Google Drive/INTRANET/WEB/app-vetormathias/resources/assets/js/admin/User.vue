
<template>
  <div>
    <table-component :url="urlTable" />
  </div>
</template>

<script>
import TableComponent from "../components/TableComponent.vue";

export default {
  components: {
    TableComponent
  },
  data() {
    return {         
      urlTable: "/admin/user/index"
    };
  }
 };
</script>
