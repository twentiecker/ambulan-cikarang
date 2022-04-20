<template>
  <div>
    <div class="position-relative">
      <!-- shape Hero -->
      <section class="section-shaped my-0">
        <div class="shape shape-style-1 shape-default shape-skew">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container shape-container d-flex">
          <div class="col px-0">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="display-3  text-white">
                  Input Galery
                  <span>Cikarang Ambulans Service</span>
                </h1>
                <p class="lead  text-white">
                  Form pendataan ambulan mulai dari tipe ambulan, nama unit,
                  plat nomor dan foto ambulan.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- 1st Hero Variation -->
    </div>

    <section class="section section-lg pt-lg-0 mt--200">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <card class="border-0" shadow body-classes="py-5">
              <base-button
                class="btn-3 mb-3"
                type="primary"
                icon="fa fa-plus-circle"
                @click="openModel"
                >Tambah Ambulan</base-button
              >
              <div class="row row-grid">
                <div class="col-lg-4" v-for="ambulan in galeri" :key="ambulan">
                  <card class="border-0 mt-4" hover shadow body-classes="py-4">
                    <b-img
                      center
                      rounded
                      thumbnail
                      fluid
                      :src="ambulan.img"
                      alt="Image 1"
                    ></b-img>

                    <div class="mt-1" align="center">
                      <badge type="primary" rounded>{{ ambulan.unit }}</badge>
                      <badge type="primary" rounded>{{ ambulan.tipe }}</badge>
                      <badge type="primary" rounded>{{ ambulan.plat }}</badge>
                    </div>
                    <div class="row">
                      <base-button
                        block
                        tag="a"
                        href="#"
                        type="warning"
                        class="mt-4 ml-3 mr-3"
                        @click="fetchData(ambulan.id)"
                      >
                        Update
                      </base-button>
                    </div>
                    <div class="row">
                      <base-button
                        block
                        tag="a"
                        href="#"
                        type="danger"
                        class="mt-2 ml-3 mr-3"
                        @click="deleteData(ambulan.id, ambulan.img)"
                      >
                        Delete
                      </base-button>
                    </div>
                  </card>
                </div>

                <!-- <div class="col-lg-4">
                  <card class="border-0 mt-4" hover shadow body-classes="py-4">
                    <b-img
                      center
                      rounded
                      thumbnail
                      fluid
                      src="img/car/car1.jpg"
                      alt="Image 1"
                    ></b-img>

                    <div class="mt-1" align="center">
                      <badge type="primary" rounded>Unit 001</badge>
                      <badge type="primary" rounded>Ambulan Jenazah</badge>
                      <badge type="primary" rounded>B 1234 JKT</badge>
                    </div>
                    <div class="row">
                      <base-button
                        block
                        tag="a"
                        href="#"
                        type="warning"
                        class="mt-4 ml-3 mr-3"
                      >
                        Update
                      </base-button>
                    </div>
                    <div class="row">
                      <base-button
                        block
                        tag="a"
                        href="#"
                        type="danger"
                        class="mt-2 ml-3 mr-3"
                      >
                        Delete
                      </base-button>
                    </div>
                  </card>
                </div>
                <div class="col-lg-4">
                  <card class="border-0 mt-4" hover shadow body-classes="py-4">
                    <b-img
                      center
                      rounded
                      thumbnail
                      fluid
                      src="img/car/car1.jpg"
                      alt="Image 1"
                    ></b-img>

                    <div class="mt-1" align="center">
                      <badge type="primary" rounded>Unit 001</badge>
                      <badge type="primary" rounded>Ambulan Jenazah</badge>
                      <badge type="primary" rounded>B 1234 JKT</badge>
                    </div>
                    <div class="row">
                      <base-button
                        block
                        tag="a"
                        href="#"
                        type="warning"
                        class="mt-4 ml-3 mr-3"
                      >
                        Update
                      </base-button>
                    </div>
                    <div class="row">
                      <base-button
                        block
                        tag="a"
                        href="#"
                        type="danger"
                        class="mt-2 ml-3 mr-3"
                      >
                        Delete
                      </base-button>
                    </div>
                  </card>
                </div> -->
              </div>
            </card>
          </div>

          <modal
            :show.sync="myModel"
            body-classes="p-0"
            modal-classes="modal-dialog-centered modal-lg"
          >
            <card
              type="secondary"
              shadow
              header-classes="bg-white pb-5"
              body-classes="px-lg-5 py-lg-5"
              class="border-0"
            >
              <template>
                <form role="form">
                  <h3
                    slot="header"
                    class="modal-title"
                    id="modal-title-notification"
                  >
                    Galery Ambulans
                  </h3>
                  <br />

                  <base-input
                    alternative
                    placeholder="Tipe Ambulan"
                    addon-left-icon="fa fa-bed"
                    v-model="tipe"
                  >
                  </base-input>
                  <base-input
                    alternative
                    placeholder="Unit Ambulan"
                    addon-left-icon="fa fa-ambulance"
                    v-model="unit"
                  >
                  </base-input>
                  <base-input
                    alternative
                    placeholder="Plat Nomor"
                    addon-left-icon="fa fa-indent"
                    v-model="plat"
                  >
                  </base-input>

                  <div class="container" id="uploadApp">
                    <div
                      v-if="successAlert"
                      class="alert alert-success alert-dismissible"
                    >
                      <a
                        href="#"
                        class="close"
                        aria-label="close"
                        @click="successAlert = false"
                        >&times;</a
                      >
                      {{ successMessage }}
                    </div>

                    <div
                      v-if="errorAlert"
                      class="alert alert-danger alert-dismissible"
                    >
                      <a
                        href="#"
                        class="close"
                        aria-label="close"
                        @click="errorAlert = false"
                        >&times;</a
                      >
                      {{ errorMessage }}
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-md-6">
                            <h3 class="panel-title">
                              Foto Ambulan
                            </h3>
                            <br />
                          </div>
                        </div>
                      </div>

                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-4" align="left">
                            <label>Select Image</label>
                          </div>
                          <div class="col-md-8">
                            <input type="file" ref="file" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <button
                              type="button"
                              @click="uploadImage"
                              class="btn-sm btn-primary"
                            >
                              Upload Image
                            </button>
                          </div>
                        </div>
                        <br />
                        <br />
                        <div v-html="uploadedImage" align="center"></div>
                      </div>
                    </div>
                  </div>

                  <base-button
                    v-if="id == null"
                    type="primary"
                    round
                    block
                    size="lg"
                    @click="submitData"
                  >
                    Submit
                  </base-button>
                  <base-button
                    v-if="id != null"
                    type="warning"
                    round
                    block
                    size="lg"
                    @click="updateData()"
                  >
                    Update
                  </base-button>
                </form>
              </template>
            </card>
          </modal>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
const axios = require("axios");
import flatPicker from "vue-flatpickr-component";
import "flatpickr/dist/flatpickr.css";
import Modal from "@/components/Modal.vue";
import Swal from "sweetalert2";

export default {
  components: {
    flatPicker,
    Modal,
  },
  data() {
    return {
      selected: 0,
      options: [
        { text: "Service in Progress", value: 0 },
        { text: "Selesai", value: 1 },
      ],
      myModel: false,

      id: null,

      galeri: "",
      tipe: "",
      unit: "",
      plat: "",

      file: "",
      uploadedImage: "",
      pathImage: "",
      tempImage: "",

      successAlert: false,
      errorAlert: false,
    };
  },
  methods: {
    openModel() {
      let self = this;

      if (self.pathImage != "") {
        axios
          .post("action.php", {
            action: "unlinkAmbulan",
            img: self.pathImage,
          })
          .then(function(response) {
            self.successAlert = false;
            self.errorAlert = false;
          });
      }

      self.myModel = true;
      self.id = null;

      self.tipe = "";
      self.unit = "";
      self.plat = "";

      self.uploadedImage = "";

      self.pathImage = "";

      self.$refs.file.value = "";
    },
    fetchData(id) {
      let self = this;

      if (self.pathImage != "") {
        axios
          .post("action.php", {
            action: "unlinkAmbulan",
            img: self.pathImage,
          })
          .then(function(response) {
            self.successAlert = false;
            self.errorAlert = false;
            self.pathImage = "";
          });
      }

      axios
        .post("action.php", {
          action: "fetchSingleAmbulan",
          id: id,
        })
        .then(function(response) {
          self.id = response.data.id;

          self.tipe = response.data.tipe;
          self.unit = response.data.unit;
          self.plat = response.data.plat;

          self.uploadedImage =
            "<img src='" +
            response.data.img +
            "' class='img-thumbnail' width='200' />";

          self.pathImage = response.data.img;

          self.tempImage = response.data.img;

          self.$refs.file.value = "";

          self.myModel = true;
        });
    },
    deleteData(id, img) {
      let self = this;

      Swal.fire({
        title: "Apakah anda yakin akan mengapus data?",
        text: "Data yang sudah dihapus tidak dapat dikembalikan lagi!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus data!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post("action.php", {
              action: "deleteAmbulan",
              id: id,
              img: img,
            })
            .then(function(response) {
              self.myModel = false;
              self.id = null;
              self.pathImage = "";

              self.fetchAllData();
              Swal.fire("Byeee...", response.data.message, "success");

              // alert(response.data.message);
            });
        }
      });

      // if (confirm("Are you sure you want to remove this data?")) {
      //   axios
      //     .post("action.php", {
      //       action: "deleteAmbulan",
      //       id: id,
      //       img: img,
      //     })
      //     .then(function(response) {
      //       self.myModel = false;
      //       self.id = null;
      //       self.pathImage = "";

      //       self.fetchAllData();
      //       alert(response.data.message);
      //     });
      // }
    },
    updateData() {
      let self = this;

      axios
        .post("action.php", {
          action: "updateAmbulan",
          id: self.id,

          tipe: self.tipe,
          unit: self.unit,
          plat: self.plat,

          img: self.pathImage,

          del_img: self.tempImage,
        })
        .then(function(response) {
          self.myModel = false;
          self.fetchAllData();
          self.id = null;

          self.tipe = "";
          self.unit = "";
          self.plat = "";

          self.uploadedImage = "";

          self.pathImage = "";

          self.tempImage = "";

          self.successAlert = false;
          self.errorAlert = false;
          Swal.fire("Voilaaa...", response.data.message, "success");

          // alert(response.data.message);
        });
    },
    uploadImage: function() {
      let self = this;

      self.file = self.$refs.file.files[0];

      var formData = new FormData();

      formData.append("file", self.file);

      axios
        .post("upload.php", formData, {
          header: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then(function(response) {
          if (response.data.image == "") {
            self.errorAlert = true;
            self.successAlert = false;
            self.errorMessage = response.data.message;
            self.successMessage = "";
            self.uploadedImage = "";
          } else {
            self.errorAlert = false;
            self.successAlert = true;
            self.errorMessage = "";
            self.successMessage = response.data.message;

            var image_html =
              "<img src='" +
              response.data.image +
              "' class='img-thumbnail' width='200' />";
            self.uploadedImage = image_html;

            var image_path = response.data.image;
            self.pathImage = image_path;

            self.$refs.file.value = "";
          }
        });
    },

    submitData: function() {
      let self = this;

      axios
        .post("action.php", {
          action: "insertAmbulan",

          tipe: self.tipe,
          unit: self.unit,
          plat: self.plat,

          img: self.pathImage,
        })
        .then(function(response) {
          self.myModel = false;
          self.fetchAllData();

          self.tipe = "";
          self.unit = "";
          self.plat = "";

          self.uploadedImage = "";

          self.pathImage = "";

          self.errorAlert = false;
          self.successAlert = false;
          Swal.fire("Voilaaa...", response.data.message, "success");

          // alert(response.data.message);
        });
    },
    fetchAllData: function() {
      let self = this;

      axios
        .post("action.php", {
          action: "fetchallAmbulan",
        })
        .then(function(response) {
          self.galeri = response.data;
        });
    },
  },
  created: function() {
    let self = this;

    self.fetchAllData();
  },
};
</script>
