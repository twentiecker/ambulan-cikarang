<template>
  <div class="profile-page">
    <section class="section-profile-cover section-shaped my-0">
      <div class="shape shape-style-1 shape-default shape-skew alpha-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </section>
    <section class="section section-skew">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <card shadow class="card-profile mt--300" no-body>
              <div class="px-4">
                <div class="row justify-content-center pb-5">
                  <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                      <a href="#">
                        <img
                          v-lazy="'img/logo/cas.jpeg'"
                          class="rounded-circle"
                        />
                      </a>
                    </div>
                  </div>
                </div>
                <div class="text-center pt-5 mt-5">
                  <h5>
                    Cikarang Ambulans Service
                    <!-- <span class="font-weight-light">, 27</span> -->
                  </h5>
                  <div class="h6 font-weight-300">
                    <i class="ni location_pin mr-2"></i>Sign in with credentials
                  </div>
                </div>
                <div class="mt-3 py-4 border-top text-center">
                  <div class="row justify-content-center">
                    <div class="col-lg-12">
                      <template>
                        <form role="form">
                          <base-input
                            alternative
                            type="email"
                            class="mb-3"
                            placeholder="Email"
                            addon-left-icon="ni ni-email-83"
                            v-model="email"
                          >
                          </base-input>

                          <base-input
                            alternative
                            type="password"
                            placeholder="Password"
                            addon-left-icon="ni ni-lock-circle-open"
                            v-model="pass"
                          >
                          </base-input>

                          <div class="text-center pt-3 mt-5">
                            <base-button
                              block
                              type="primary"
                              class="my-4"
                              @click="onSubmit"
                              >Sign In</base-button
                            >
                          </div>
                        </form>
                      </template>
                      <!-- <a href="#">Show more</a> -->
                    </div>
                  </div>
                </div>
              </div>
            </card>
          </div>
        </div>
      </div>

      <!-- <modal
        :show.sync="modal"
        gradient="danger"
        modal-classes="modal-danger modal-dialog-centered"
      >
        <div class="py-3 text-center">
          <i class="ni ni-bell-55 ni-3x"></i>
          <h4 class="heading mt-4">{{ pesan }}</h4>
        </div>

        <template slot="footer">
          <base-button type="white" @click="modal = false"
            >Ok, Got it</base-button
          >
          <base-button
            type="link"
            text-color="white"
            class="ml-auto"
            @click="modal = false"
          >
            Close
          </base-button>
        </template>
      </modal>

      <modal
        :show.sync="modalok"
        gradient="primary"
        modal-classes="modal-primary modal-dialog-centered"
      >
        <div class="py-3 text-center">
          <i class="ni ni-lock-circle-open ni-3x"></i>
          <h4 class="heading mt-4">{{ pesan }}</h4>
        </div>

        <template slot="footer">
          <base-button type="white" @click="redirectPath"
            >Ok, Got it</base-button
          >
          <base-button
            type="link"
            text-color="white"
            class="ml-auto"
            @click="redirectPath"
          >
            Close
          </base-button>
        </template>
      </modal> -->
    </section>
  </div>
</template>
<script>
const axios = require("axios");
import Modal from "@/components/Modal.vue";
import Swal from "sweetalert2";

export default {
  components: {
    Modal,
  },
  data() {
    return {
      email: "",
      pass: "",
      // modal: false,
      // modalok: false,
      // pesan: "",
    };
  },
  methods: {
    onSubmit() {
      let self = this;
      let cek_email = self.validateEmail();

      if (!cek_email) {
        Swal.fire("Ooops...", "Format email salah", "error");
        // self.modalok = true;
        // self.pesan = "Format email salah";
      } else {
        axios
          .post("action.php", {
            action: "login",
            email: self.email,
            pass: self.pass,
          })
          .then(function(response) {
            self.email = "";
            self.pass = "";
            localStorage.setItem("user", JSON.stringify(response.data.user));
            self.$store.dispatch("user", response.data.user);
            self.alertMessage(response.data);
            // self.redirectPath(response.data.user);
          });
      }
    },
    validateEmail() {
      let self = this;

      const cek = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return cek.test(self.email);
    },
    // redirectPath() {
    //   let self = this;

    //   self.modalok = false;
    //   // self.$router.push("/");
    // },
    alertMessage(data) {
      let self = this;

      if (data.user) {
        Swal.fire("Voilaaa...", data.message, "success");
        self.$router.push("/");
        // self.modalok = true;
        // self.pesan = data.message;
      } else {
        Swal.fire("Ooops...", data.message, "error");
        // self.modal = true;
        // self.pesan = data.message;
      }
    },
  },
};
</script>
<style></style>
