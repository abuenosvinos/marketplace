<template>
  <div class="product-grid">
    <div class="row">
      <card-loader :loopCount="4" v-if="loading" />
      <div class="col-md-3" v-for="(item, index) in listProducts" :key="index">
        <card-template :item="item" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CardLoader from "../shared/CardLoader";
import CardTemplate from "../shared/CardTemplate";
export default {
  name: "ProductGrid",
  components: { CardLoader, CardTemplate },
  data() {
    return {
      listProducts: [],
      loading: false,
    };
  },
  methods: {
    getProducts() {
      this.loading = true;
      axios
          //.get(`${process.env.API_URL}`)
          .get('https://bouquets.herokuapp.com/bouquets')

        .then((response) => {
          this.loading = false;
          this.listProducts = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
  created() {
    this.getProducts();
  },
};
</script>

<style>
.product-grid {
  padding: 0;
}
</style>
