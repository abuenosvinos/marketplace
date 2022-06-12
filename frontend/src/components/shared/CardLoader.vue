<template>
  <div class="cardLoader">
    <div class="row">
      <div class="col-md-3" v-for="loop in loopCount" v-bind:key="loop">
        <vcl-code
          :class="col-md-3"
          :width="200"
          :height="200"
          style="padding: 20px"
        ></vcl-code>
      </div>
    </div>
  </div>
</template>
<script>
import { VclCode } from "vue-content-loading";

export default {
  name: "cardLoader",
  props: ["loopCount"],
  components: { VclCode },
};
</script>

<style>
</style>