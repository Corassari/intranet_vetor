<template>
  <div class="table-responsive">
    <table class="table table-striped table-sm table-condensed table-hover">
      <thead>
        <tr>
          <th v-for="head in thead" :key="head">{{head}}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="body in tbody" :key="body.index">
          <td v-for="info in body.content" :key="info">{{ info }}</td>
          <td v-if="action" class="text-right">
            <div class="dropdown">
              <a
                class="btn btn-sm btn-icon-only text-light"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fas fa-ellipsis-v"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a
                  class="dropdown-item"
                  :href="act.href"
                  v-for="(act,i) in action[body.index]"
                  :key="i"
                >{{ act.desc }}</a>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "TableResult",
  props: ["url"],
  data() {
    return {
      thead: [],
      tbody: [],
      action: [],
      resp: ""
    };
  },
  mounted() {
    var vw = this;
    
    if ((this.url)) {
  
      axios
        .post(this.url)
        .then(function(response) {
          var dados = response.data;
          var header = dados["header"];
          var body = dados["body"];
          var action = dados["action"];

          console.log(action);

          vw.thead = header;
          vw.tbody = body;
          vw.action = action;
        })
        .catch(function(msgError) {
          console.log(msgError);
        });
    } else {
      console.log("Nenhum URL foi indicada");
    }
  }
};
</script>
