<template>
  <div class="home">
    <ProductGrid></ProductGrid>
  </div>
</template>

<script>
import ProductGrid from "@/components/products/ProductGrid.vue";
export default {
  title: 'Listado de productos',
  name: "home",
  components: {
    ProductGrid,
  },
};
</script>

<style>
.home {
  margin-top: 10px;
}
</style>
