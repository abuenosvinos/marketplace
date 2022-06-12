import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import titleMixin from './mixins/titleMixin'

Vue.config.productionTip = false;

Vue.mixin(titleMixin)

// eslint-disable-next-line no-unused-vars
let vm = new Vue({
  router,
  render: (h) => h(App),
}).$mount("#app");
