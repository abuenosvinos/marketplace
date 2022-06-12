<template>
    <div class="card mb-4 shadow-sm" v-on:click="navigateProductDetail(item)">
      <img
        class="card-img-top mt-2"
        v-bind:src="item.image"
        :alt="item.name"
        style="max-width: 127.135px; margin: auto"
      />
      <div class="card-body">
        <div class="card-text">{{ item.name }}</div>
        <div class="card-price">{{ item.price }}</div>
      </div>
    </div>
</template>

<script>
export default {
  name: "cardTemplate",
  props: ["item"],
  data() {
    return {
    };
  },
  components: {},
  methods: {
    navigateProductDetail(product) {
      this.$router.push({
        name: "productDetails",
        params: { id: product.id },
      });
    },
  },
  mounted() {},
};
</script>

<style>
.card {
  height: auto;
  cursor: pointer;
}
.card-body div {
  text-align: left;
  overflow: hidden;
  display: inline-block;
  text-overflow: ellipsis;
  white-space: nowrap;
  width:100%;
}
.card-text {
  font-size: 0.8em;
}
.card-price {
  font-size: 0.7em;
}
</style>