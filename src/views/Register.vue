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
                    <i class="ni location_pin mr-2"></i>Sign up with credentials
                  </div>
                </div>
                <div class="mt-3 py-4 border-top text-center">
                  <div class="row justify-content-center">
                    <div class="col-lg-12">
                      <template>
                        <form role="form">
                          <base-input
                            alternative
                            class="mb-3"
                            placeholder="Name"
                            addon-left-icon="ni ni-hat-3"
                            v-model="name"
                          >
                          </base-input>
                          <base-input
                            alternative
                            class="mb-3"
                            type="email"
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
                              >Create account</base-button
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
        <h6 slot="header" class="modal-title" id="modal-title-notification">
          Notifikasi
        </h6>

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
        <h6 slot="header" class="modal-title" id="modal-title-notification">
          Notifikasi
        </h6>

        <div class="py-3 text-center">
          <i class="ni ni-lock-circle-open ni-3x"></i>
          <h4 class="heading mt-4">{{ pesan }}</h4>
        </div>

        <template slot="footer">
          <base-button type="white" @click="modalok = false"
            >Ok, Got it</base-button
          >
          <base-button
            type="link"
            text-color="white"
            class="ml-auto"
            @click="modalok = false"
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
      name: "",
      email: "",
      pass: "",
      // modal: false,
      // modalok: false,
      // pesan: "",
      // show: true,
    };
  },
  methods: {
    onSubmit() {
      let self = this;

      if (self.name && self.email && self.pass) {
        let cek_email = self.validateEmail();

        if (!cek_email) {
          Swal.fire("Ooops...", "Format email salah!", "error");

          // self.modal = true;
          // self.pesan = "Format email salah";
        } else {
          axios
            .post("action.php", {
              action: "signup",
              name: self.name,
              email: self.email,
              pass: self.pass,
            })
            .then(function(response) {
              self.name = "";
              self.email = "";
              self.pass = "";
              self.alertMessage(response.data);
              // alert(response.data.message);
            });
        }
      } else {
        if (!self.name && !self.email && !self.pass) {
          Swal.fire("Ooops...", "Isian tidak boleh kosong!", "error");

          // self.modal = true;
          // self.pesan = "Isian tidak boleh kosong!";
        } else {
          if (!self.name) {
            Swal.fire("Ooops...", "Nama tidak boleh kosong!", "error");

            // self.modal = true;
            // self.pesan = "Nama tidak boleh kosong!";
          } else if (!self.email) {
            Swal.fire("Ooops...", "Email tidak boleh kosong!", "error");

            // self.modal = true;
            // self.pesan = "Email tidak boleh kosong!";
          } else if (!self.pass) {
            Swal.fire("Ooops...", "Password tidak boleh kosong!", "error");

            // self.modal = true;
            // self.pesan = "Password tidak boleh kosong!";
          }
        }
      }
    },
    validateEmail() {
      let self = this;

      const cek = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return cek.test(self.email);
    },
    alertMessage(data) {
      let self = this;

      if (data.baris) {
        Swal.fire("Voilaaa...", data.message, "success");

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
