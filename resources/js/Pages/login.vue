<template>
  <v-app>
    <div class="fill-height" fluid>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-window v-model="step">
                <v-window-item :value="1">
                  <v-toolbar dark color="light-green accent-3">
                    <v-toolbar-title style="color: black"
                      >¡BIENVENIDO!</v-toolbar-title
                    >
                  </v-toolbar>
                  <v-col
                    cols="10"
                    sm="10"
                    md="10"
                    offset="1"
                    offset-sm="1"
                    offset-md="1"
                  >
                    <v-card-text>
                      <v-form ref="form_login" v-model="form_login_valid">
                        <v-text-field
                          v-model="form_login.user"
                          :rules="userRules"
                          prepend-icon="person"
                          name="login"
                          label="Usuario"
                          type="text"
                          autocomplete="off"
                          color="light-green accent-4"
                          tabindex="1"
                        ></v-text-field>
                        <v-text-field
                          v-model="form_login.password"
                          :type="value ? 'password' : 'text'"
                          :rules="passwordRules"
                          @click:append="() => (value = !value)"
                          id="password"
                          prepend-icon="lock"
                          name="password"
                          label="Contraseña"
                          :append-icon="value ? 'visibility' : 'visibility_off'"
                          autocomplete="off"
                          color="light-green accent-4"
                          tabindex="2"
                        ></v-text-field>
                      </v-form>
                    </v-card-text>
                  </v-col>

                  <v-card-actions class="justify-center">
                    <v-btn
                      color="light-green accent-2"
                      @click="Login"
                      tabindex="3"
                      >Entrar</v-btn
                    >
                  </v-card-actions>
                  <br />
                  <v-card-actions class="justify-center">
                    <a
                      class="text-sm-body-2"
                      style="color: #64dd17"
                      @click="MoveRegisterForm"
                      title="Registrarse"
                      tabindex="4"
                      >¿Eres nuevo, regístrate?</a
                    >
                  </v-card-actions>
                </v-window-item>
                <v-window-item :value="2">
                  <v-toolbar dark color="light-green accent-3">
                    <v-toolbar-title style="color: black"
                      >¡REGÍSTRATE!</v-toolbar-title
                    >
                  </v-toolbar>
                  <v-col
                    cols="10"
                    sm="10"
                    md="10"
                    offset="1"
                    offset-sm="1"
                    offset-md="1"
                  >
                    <v-card-text>
                      <v-form ref="form_register" v-model="form_register_valid">
                        <v-text-field
                          v-model="form_register.user_r1"
                          :rules="user_r1_rules"
                          prepend-icon="person"
                          name="user_r1"
                          label="Usuario"
                          type="text"
                          autocomplete="off"
                          color="light-green accent-4"
                          tabindex="1"
                        ></v-text-field>
                        <v-text-field
                          v-model="form_register.password_r1"
                          :type="value_1 ? 'password' : 'text'"
                          :rules="password_r1_rules"
                          :append-icon="
                            value_1 ? 'visibility' : 'visibility_off'
                          "
                          @click:append="() => (value_1 = !value_1)"
                          id="password_r1"
                          prepend-icon="lock"
                          name="password_r1"
                          label="Contraseña"
                          autocomplete="off"
                          color="light-green accent-4"
                          tabindex="2"
                        ></v-text-field>
                        <v-text-field
                          v-model="form_register.password_r2"
                          :type="value_2 ? 'password' : 'text'"
                          :rules="
                            password_r2_rules.concat(passwordConfirmationRule)
                          "
                          id="password_r2"
                          prepend-icon="lock"
                          name="password_r2"
                          label="Repetir contraseña"
                          autocomplete="off"
                          color="light-green accent-4"
                          :append-icon="
                            value_2 ? 'visibility' : 'visibility_off'
                          "
                          @click:append="() => (value_2 = !value_2)"
                          tabindex="3"
                        ></v-text-field>
                      </v-form>
                    </v-card-text>
                  </v-col>

                  <v-card-actions class="justify-center">
                    <v-spacer></v-spacer>
                    <v-btn
                      color="light-green accent-2"
                      @click="ValidRegister"
                      tabindex="4"
                      >Confirmar</v-btn
                    >

                    <v-btn
                      color="light-green lighten-1"
                      @click="MoveLoginForm"
                      tabindex="5"
                      >Cancelar</v-btn
                    >
                  </v-card-actions>
                </v-window-item>
              </v-window>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>

      <v-dialog
        v-model="confirm_dialog"
        persistent
        :max-width="$vuetify.breakpoint.xs ? '100%' : '25%'"
      >
        <v-card>
          <v-card-title class="light-green accent-3 text-center">
            REGISTRAR USUARIO
          </v-card-title>

          <v-card-text class="mt-4 body-1"> ¿Desea continuar? </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="light-green accent-2 " @click="RegisterUser">
              <span class="material-icons"> done </span>Si
            </v-btn>

            <v-btn color="light-green accent-2" @click="confirm_dialog = false">
              <span class="material-icons"> clear </span>No
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <v-dialog
        v-model="message_dialog"
        persistent
        :max-width="$vuetify.breakpoint.xs ? '100%' : '25%'"
      >
        <v-card>
          <v-card-title class="light-green accent-3 text-center">
            {{ message_title }}
          </v-card-title>

          <v-card-text class="mt-4 body-1">
            {{ message_text }}
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="light-green accent-3" @click="ConfirmMessage">
              <span class="material-icons"> done </span>Ok
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </div>
  </v-app>
</template>

<script>
export default {
  data: () => ({
    step: 1,
    value: String,
    value_1: String,
    value_2: String,
    confirm_dialog: false,
    message_dialog: false,
    message_title: null,
    message_text: null,
    message_type: null,
    form_login_valid: false,
    form_login: {
      user: null,
      password: null,
    },
    form_register_valid: false,
    form_register: {
      user_r1: null,
      password_r1: null,
      password_r2: null,
    },
    userRules: [(v) => !!v || "Ingrese su usuario"],
    passwordRules: [(v) => !!v || "Ingrese su contraseña"],
    user_r1_rules: [(v) => !!v || "Ingrese su usuario"],
    password_r1_rules: [
      (v) => !!v || "Ingrese su contraseña",
      (v) => /^.{6,15}$/.test(v) || "Entre 6 y 15 caractéres",
    ],
    password_r2_rules: [(v) => !!v || "Repita su contraseña"],
  }),

  mounted() {
    document.title = "Login";
  },
  computed: {
    passwordConfirmationRule() {
      return () =>
        this.form_register.password_r2 === this.form_register.password_r1 ||
        "Las contraseñas deben coincidir.";
    },
  },
  methods: {
    Login() {
      let self = this;
      this.$refs.form_login.validate();

      if (this.form_login_valid) {
        axios
          .post(route("login.access"), self.form_login)
          .then(function (response) {
            let result = response.data;
            if (result == "ERROR") {
              self.message_type = "ERROR";
              self.message_title = "¡Ups!";
              self.message_text =
                "Usuario y/o contraseña incorrecta, intente nuevamente.";
              self.message_dialog = true;
            } else if (result == "SUCCESS") {
              self.$inertia.get(route("dashboard"));
            }
          });
      }
    },

    ValidRegister() {
      this.$refs.form_register.validate();
      if (this.form_register_valid) {
        this.confirm_dialog = true;
      }
    },
    RegisterUser() {
      let self = this;
      axios
        .post(route("login.verify"), { user: this.form_register.user_r1 })
        .then(function (response) {
          let result = response.data;
          if (result == "EXISTS") {
            self.message_type = "ERROR";
            self.message_title = "¡Ups!";
            self.message_text =
              "El usuario ingresado ya se encuentra registrado, intente nuevamente.";
            self.confirm_dialog = false;
            self.message_dialog = true;
          } else if (result == "NOT EXISTS") {
            self.$inertia.post(route("login.register"), self.form_register, {
              preserveScroll: true,
              onSuccess: () => {
                self.message_type = "SUCCESS";
                self.message_title = "¡ÉXITO!";
                self.message_text =
                  "Te has registrado correctamente, ahora puedes iniciar sesión.";
                self.confirm_dialog = false;
                self.message_dialog = true;
              },
            });
          }
        });
      // this.$inertia.post(route("user_store"), this.form_register);
    },
    ConfirmMessage() {
      if (this.message_type == "ERROR") {
        this.message_dialog = false;
        return false;
      } else if (this.message_type == "SUCCESS") {
        this.MoveLoginForm();
        this.message_dialog = false;
      }
    },
    MoveRegisterForm() {
      return this.step++;
    },
    MoveLoginForm() {
      this.$refs.form_login.reset();
      this.$refs.form_login.resetValidation();
      this.$refs.form_register.reset();
      this.$refs.form_register.resetValidation();
      return this.step--;
    },
  },
};
</script>