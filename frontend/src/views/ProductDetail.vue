<template>
  <div class="product-details">
    <div class="container">
      <div class="row mb-3">
        <div class="col-sm-4">
          <div class="product-image">
              <img
                v-bind:src="product.image"
                v-bind:alt="product.name"
                class="img-fluid rounded"
                style="margin: auto"
              />
          </div>
        </div>
        <div class="col-sm-8">
          <div class="product-detail">
            <h5 class="product-head">Product Details</h5>
            <table class="table" style="max-height: 28px">
              <tbody>
                <tr>
                  <th scope="row">Product Name</th>
                  <td>{{ product.name }}</td>
                </tr>
                <tr>
                  <th scope="row">Product Price</th>
                  <td>{{ product.price }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "productDetail",
  title () {
    return `Product detail — ${this.product.name}`
  },
  data() {
    return {
      product: {}
    };
  },
  methods: {
  },
  created() {
    axios
        .get(`https://bouquets.herokuapp.com/bouquets/${this.$route.params.id}`)
        //.get('https://bouquets.herokuapp.com/bouquets')
      .then((response) => {
        this.product = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<style>
.product-details {
  padding-top: 60px;
}
.product-detail {
  text-align: start;
}
.product-detail .product-head {
  padding: 10px;
  font-weight: 500;
}
.product-detail .table th {
  width: 152px;
}
</style>
