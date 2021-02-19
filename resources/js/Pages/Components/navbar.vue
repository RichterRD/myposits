     
     <template>
  <v-navigation-drawer
    class="navbar"
    permanent
    expand-on-hover
    height="50%"
    style="margin-top: 10%"
    color="light-green accent-2"
    z-index="4"
  >
    <v-list>
      <v-list-item class="px-2">
        <v-list-item-avatar>
          <v-img :src="'/images/user_default.png'"></v-img>
        </v-list-item-avatar>
      </v-list-item>

      <v-list-item link>
        <v-list-item-content>
          <v-list-item-title class="title">
            {{ $page.props.user_session.name }}
          </v-list-item-title>
          <v-list-item-subtitle>{{
            $page.props.user_session.user
          }}</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>

    <v-divider></v-divider>

    <v-list nav dense>
      <!-- <v-list-item-icon>
            <v-icon>mdi-folder</v-icon>
          </v-list-item-icon>
          <v-list-item-title>My posits</v-list-item-title>
         -->
      <v-list-item class="menu-item" link>
        <v-list-item-icon>
          <v-icon> home </v-icon>
        </v-list-item-icon>
        <v-list-item-title>Principal</v-list-item-title>
      </v-list-item>
      <v-list-item class="menu-item" link>
        <v-list-item-icon>
          <v-icon> sticky_note_2 </v-icon>
        </v-list-item-icon>
        <v-list-item-title>My posits</v-list-item-title>
      </v-list-item>
      <inertia-link
        class="v-list-item menu-item theme--light"
        :href="route('categories')"
      >
        <v-list-item-icon>
          <v-icon>category</v-icon>
        </v-list-item-icon>
        <v-list-item-title>Categorías</v-list-item-title>
      </inertia-link>

      <v-list-item class="menu-item" link>
        <v-list-item-icon>
          <v-icon>mdi-logout</v-icon>
        </v-list-item-icon>
        <v-list-item-title>Cerrar sesión</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

     <script>
export default {};
</script>

<style lang="sass">
.menu-item:hover
    background: white

.navbar
    position: fixed !important
    z-index: 100 !important
</style>

     
      