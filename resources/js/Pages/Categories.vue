<template>
  <v-app>
    <v-card height="100%">
      <navbar></navbar>
      <bodycontent>
        <div slot="content"><p>holi</p></div>
      </bodycontent>
    </v-card>
  </v-app>
</template>
<script>
import navbar from "./Components/navbar";
import bodycontent from "./Components/bodycontent";

export default {
  components: {
    navbar,
    bodycontent,
  },
  mounted() {
    document.title = "Categorías";
  },
};
</script>

<style lang="sass">
</style>