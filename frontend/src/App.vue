<template>
  <div id="app" class="container">
    <main>
      <router-view />
    </main>
  </div>
</template>

<script>
export default {
  data() {
  },
  methods: {
  },
  created() {
    // Doesn't work
    console.log(process.env.NODE_ENV);
    console.log(process.env.API_URL);
  },
};
</script>


<style lang="css">
@import "../node_modules/bootstrap/dist/css/bootstrap.min.css";

#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

html {
  position: relative;
  min-height: 100%;
}

body {
  margin-bottom: 60px; /* Margin bottom by footer height */
}

* a {
  color: #42b983;
}

* .fa {
  font-size: 18px;
}
</style>
