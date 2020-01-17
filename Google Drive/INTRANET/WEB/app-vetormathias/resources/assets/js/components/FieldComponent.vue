<template>
  <div :class="sizeCol()">
    <label class="form-control-label" v-if="dataField.label">{{ dataField.label }}</label>
    <input 
      :type="dataField.type"
      class="form-control"     
      :class="sizeInput()"
      :placeholder="dataField.placeholder"
      :value="dataField.value"
      :name="dataField.name"
    />
    <div class="invalid-feedback">{{ dataField.feedback }}</div>
  </div>
</template>
<script>
export default {
  props: {
    dataField: {
      type: Object
    }
  },
  data() {
    return {
      dataSizeRow: 12
    };
  },
  methods: {    
    sizeInput() {
      var _class;
      _class = this.dataField.feedback ? ' is-invalid' : "";
      _class += this.dataField.class.size ? ' input-' + this.dataField.class.size : "";
      _class += this.dataField.class.custom? ' '+this.dataField.class.custom:'';
      _class += this.dataField.class.alternative? ' form-control-alternative':'';
      return _class
    },

    sizeCol() {
      console.log(this.dataField)
      if (this.dataField.sizeCol) {
        //this.dataSizeRow += this.fieldColSize;
        return "col-md-" + this.dataField.sizeCol;
      } else {
        return '';
      }
    }
  }
};
</script>
