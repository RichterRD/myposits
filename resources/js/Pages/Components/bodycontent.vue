<template>
  <v-card class="content">
    <slot name="content"></slot>
  </v-card>
</template>

<script>
export default {};
</script>

<style lang="sass">
.content

  top: 5%
  left: 5%
  position: absolute
  width: 90%
  height: 85%
  background: red !important
  z-index: 1 !important
</style>