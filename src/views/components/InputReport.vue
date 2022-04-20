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
                  Input Report
                  <span>Cikarang Ambulans Service</span>
                </h1>
                <p class="lead  text-white">
                  Form pembuatan laporan dan dokumentasi pelayanan yang
                  dilakukan oleh Cikarang Ambulans Service, baik yang sedang
                  dalam proses pelayanan maupun yang sudah selesai.
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
            <div class="row row-grid">
              <div class="col-lg-12">
                <card class="border-0" shadow body-classes="py-5">
                  <div class="table-responsive-md">
                    <base-button
                      class="btn-3 mb-3"
                      type="primary"
                      icon="fa fa-plus-circle"
                      @click="openModel"
                      >Tambah Laporan</base-button
                    >
                    <!-- <h6><i>*) click for detail report</i></h6> -->
                    <table class="table caption-top">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Hari/Tanggal</th>
                          <th scope="col">Pasien</th>
                          <th scope="col">Unit Ambulan</th>
                        </tr>
                      </thead>
                      <tbody
                        v-for="item in laporan"
                        :key="item"
                        @click="fetchData(item.id)"
                      >
                        <tr class="clickable-row">
                          <th scope="row">{{ item.id }}</th>
                          <td>{{ item.tanggal }}</td>
                          <td>{{ item.pasien }}</td>
                          <td>{{ item.unit }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </card>

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
                          Service Report
                        </h3>
                        <br />
                        <base-input
                          alternative
                          addon-left-icon="fa fa-calendar"
                        >
                          <flat-picker
                            slot-scope="{ focus, blur }"
                            @on-open="focus"
                            @on-close="blur"
                            :config="{ allowInput: true }"
                            class="form-control datepicker"
                            placeholder="Hari/Tanggal"
                            v-model="tanggal"
                          >
                          </flat-picker>
                        </base-input>
                        <base-input
                          alternative
                          placeholder="Penjemputan"
                          addon-left-icon="fa fa-map-marker"
                          v-model="jemput"
                        >
                        </base-input>
                        <base-input
                          alternative
                          placeholder="Tujuan"
                          addon-left-icon="fa fa-map-marker"
                          v-model="tujuan"
                        >
                        </base-input>
                        <base-input
                          alternative
                          placeholder="Nama Pasien"
                          addon-left-icon="fa fa-user-circle-o"
                          v-model="pasien"
                        >
                        </base-input>
                        <base-input
                          alternative
                          type="number"
                          placeholder="Usia"
                          addon-left-icon="fa fa-circle-o-notch"
                          v-model="usia"
                        >
                        </base-input>
                        <base-input
                          alternative
                          placeholder="Status Pasien"
                          addon-left-icon="fa fa-bed"
                          v-model="status"
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
                        <base-input
                          alternative
                          type="time"
                          placeholder="Jam Berangkat"
                          addon-left-icon="fa fa-clock-o"
                          v-model="jam"
                        >
                        </base-input>
                        <base-input
                          alternative
                          placeholder="Rute"
                          addon-left-icon="fa fa-map"
                          v-model="rute"
                        >
                        </base-input>
                        <base-input
                          alternative
                          placeholder="Pilot"
                          addon-left-icon="fa fa-id-card-o"
                          v-model="pilot"
                        >
                        </base-input>
                        <base-input
                          alternative
                          placeholder="Co-Pilot"
                          addon-left-icon="fa fa-id-card-o"
                          v-model="copilot"
                        >
                        </base-input>
                        <base-input
                          alternative
                          type="tel"
                          placeholder="CP Co-Pilot"
                          addon-left-icon="fa fa-phone"
                          v-model="cp"
                        >
                        </base-input>

                        <b-form-group
                          label="Status Pelayanan"
                          v-slot="{ ariaDescribedby }"
                        >
                          <b-form-radio-group
                            v-model="selected"
                            :options="options"
                            :aria-describedby="ariaDescribedby"
                            name="radio-inline"
                          ></b-form-radio-group>
                        </b-form-group>

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
                                    Foto Dokumentasi
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

                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-4" align="left">
                                  <label>Select Image</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="file" ref="file1" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <button
                                    type="button"
                                    @click="uploadImage1"
                                    class="btn-sm btn-primary"
                                  >
                                    Upload Image
                                  </button>
                                </div>
                              </div>
                              <br />
                              <br />
                              <div v-html="uploadedImage1" align="center"></div>
                            </div>

                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-4" align="left">
                                  <label>Select Image</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="file" ref="file2" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <button
                                    type="button"
                                    @click="uploadImage2"
                                    class="btn-sm btn-primary"
                                  >
                                    Upload Image
                                  </button>
                                </div>
                                <div class="col-md-6">
                                  <div
                                    v-html="uploadedImage2"
                                    align="right"
                                  ></div>
                                </div>
                              </div>
                              <br />
                              <br />
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
                        <base-button
                          v-if="id != null"
                          type="danger"
                          round
                          block
                          size="lg"
                          @click="deleteData(id)"
                        >
                          Delete
                        </base-button>
                      </form>
                    </template>
                  </card>
                </modal>
              </div>
            </div>
          </div>
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
      laporan: "",
      tanggal: "",
      jemput: "",
      tujuan: "",
      pasien: "",
      usia: "",
      status: "",
      unit: "",
      plat: "",
      jam: "",
      rute: "",
      pilot: "",
      copilot: "",
      cp: "",

      file: "",
      uploadedImage: "",
      pathImage: "",
      tempImage: "",

      file1: "",
      uploadedImage1: "",
      pathImage1: "",
      tempImage1: "",

      file2: "",
      uploadedImage2: "",
      pathImage2: "",
      tempImage2: "",

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
            action: "unlink",
            img: self.pathImage,
          })
          .then(function(response) {
            self.successAlert = false;
            self.errorAlert = false;
          });
      }

      if (self.pathImage1 != "") {
        axios
          .post("action.php", {
            action: "unlink",
            img: self.pathImage1,
          })
          .then(function(response) {
            self.successAlert = false;
            self.errorAlert = false;
          });
      }

      if (self.pathImage2 != "") {
        axios
          .post("action.php", {
            action: "unlink",
            img: self.pathImage2,
          })
          .then(function(response) {
            self.successAlert = false;
            self.errorAlert = false;
          });
      }

      self.myModel = true;
      self.id = null;
      self.tanggal = "";
      self.jemput = "";
      self.tujuan = "";
      self.pasien = "";
      self.usia = "";
      self.status = "";
      self.unit = "";
      self.plat = "";
      self.jam = "";
      self.rute = "";
      self.pilot = "";
      self.copilot = "";
      self.cp = "";
      self.selected = 0;
      self.uploadedImage = "";
      self.uploadedImage1 = "";
      self.uploadedImage2 = "";
      self.pathImage = "";
      self.pathImage1 = "";
      self.pathImage2 = "";
      self.$refs.file.value = "";
      self.$refs.file1.value = "";
      self.$refs.file2.value = "";
    },
    fetchData(id) {
      let self = this;

      if (self.pathImage != "") {
        axios
          .post("action.php", {
            action: "unlink",
            img: self.pathImage,
          })
          .then(function(response) {
            self.successAlert = false;
            self.errorAlert = false;
            self.pathImage = "";
          });
      }

      if (self.pathImage1 != "") {
        axios
          .post("action.php", {
            action: "unlink",
            img: self.pathImage1,
          })
          .then(function(response) {
            self.successAlert = false;
            self.errorAlert = false;
            self.pathImage1 = "";
          });
      }

      if (self.pathImage2 != "") {
        axios
          .post("action.php", {
            action: "unlink",
            img: self.pathImage2,
          })
          .then(function(response) {
            self.successAlert = false;
            self.errorAlert = false;
            self.pathImage2 = "";
          });
      }

      axios
        .post("action.php", {
          action: "fetchSingle",
          id: id,
        })
        .then(function(response) {
          self.id = response.data.id;
          self.tanggal = response.data.tanggal;
          self.jemput = response.data.jemput;
          self.tujuan = response.data.tujuan;
          self.pasien = response.data.pasien;
          self.usia = response.data.usia;
          self.status = response.data.status;
          self.unit = response.data.unit;
          self.plat = response.data.plat;
          self.jam = response.data.jam;
          self.rute = response.data.rute;
          self.pilot = response.data.pilot;
          self.copilot = response.data.copilot;
          self.cp = response.data.cp;
          self.selected = response.data.flag;
          self.uploadedImage =
            "<img src='" +
            response.data.img +
            "' class='img-thumbnail' width='200' />";
          self.uploadedImage1 =
            "<img src='" +
            response.data.img1 +
            "' class='img-thumbnail' width='200' />";
          self.uploadedImage2 =
            "<img src='" +
            response.data.img2 +
            "' class='img-thumbnail' width='200' />";
          self.pathImage = response.data.img;
          self.pathImage1 = response.data.img1;
          self.pathImage2 = response.data.img2;
          self.tempImage = response.data.img;
          self.tempImage1 = response.data.img1;
          self.tempImage2 = response.data.img2;
          self.$refs.file.value = "";
          self.$refs.file1.value = "";
          self.$refs.file2.value = "";
          self.myModel = true;
        });
    },
    deleteData(id) {
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
              action: "delete",
              id: id,
              img: self.pathImage,
              img1: self.pathImage1,
              img2: self.pathImage2,
            })
            .then(function(response) {
              self.myModel = false;
              self.id = null;
              self.pathImage = "";
              self.pathImage1 = "";
              self.pathImage2 = "";
              self.fetchAllData();
              Swal.fire("Byeee...", response.data.message, "success");
              // alert(response.data.message);
            });
        }
      });

      // if (confirm("Are you sure you want to remove this data?")) {
      //   axios
      //     .post("action.php", {
      //       action: "delete",
      //       id: id,
      //       img: self.pathImage,
      //       img1: self.pathImage1,
      //       img2: self.pathImage2,
      //     })
      //     .then(function(response) {
      //       self.myModel = false;
      //       self.id = null;
      //       self.pathImage = "";
      //       self.pathImage1 = "";
      //       self.pathImage2 = "";
      //       self.fetchAllData();
      //       alert(response.data.message);
      //     });
      // }
    },
    updateData() {
      let self = this;

      axios
        .post("action.php", {
          action: "update",
          id: self.id,
          tanggal: self.tanggal,
          jemput: self.jemput,
          tujuan: self.tujuan,
          pasien: self.pasien,
          usia: self.usia,
          status: self.status,
          unit: self.unit,
          plat: self.plat,
          jam: self.jam,
          rute: self.rute,
          pilot: self.pilot,
          copilot: self.copilot,
          cp: self.cp,
          flag: self.selected,
          img: self.pathImage,
          img1: self.pathImage1,
          img2: self.pathImage2,

          del_img: self.tempImage,
          del_img1: self.tempImage1,
          del_img2: self.tempImage2,
        })
        .then(function(response) {
          self.myModel = false;
          self.fetchAllData();
          self.id = null;
          self.tanggal = "";
          self.jemput = "";
          self.tujuan = "";
          self.pasien = "";
          self.usia = "";
          self.status = "";
          self.unit = "";
          self.plat = "";
          self.jam = "";
          self.rute = "";
          self.pilot = "";
          self.copilot = "";
          self.cp = "";
          self.selected = 0;
          self.uploadedImage = "";
          self.uploadedImage1 = "";
          self.uploadedImage2 = "";
          self.pathImage = "";
          self.pathImage1 = "";
          self.pathImage2 = "";
          self.tempImage = "";
          self.tempImage1 = "";
          self.tempImage2 = "";
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
    uploadImage1: function() {
      let self = this;

      self.file1 = self.$refs.file1.files[0];

      var formData = new FormData();

      formData.append("file", self.file1);

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
            self.uploadedImage1 = "";
          } else {
            self.errorAlert = false;
            self.successAlert = true;
            self.errorMessage = "";
            self.successMessage = response.data.message;

            var image_html =
              "<img src='" +
              response.data.image +
              "' class='img-thumbnail' width='200' />";
            self.uploadedImage1 = image_html;

            var image_path = response.data.image;
            self.pathImage1 = image_path;

            self.$refs.file1.value = "";
          }
        });
    },
    uploadImage2: function() {
      let self = this;

      self.file2 = self.$refs.file2.files[0];

      var formData = new FormData();

      formData.append("file", self.file2);

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
            self.uploadedImage2 = "";
          } else {
            self.errorAlert = false;
            self.successAlert = true;
            self.errorMessage = "";
            self.successMessage = response.data.message;

            var image_html =
              "<img src='" +
              response.data.image +
              "' class='img-thumbnail' width='200' />";
            self.uploadedImage2 = image_html;

            var image_path = response.data.image;
            self.pathImage2 = image_path;

            self.$refs.file2.value = "";
          }
        });
    },
    submitData: function() {
      let self = this;

      axios
        .post("action.php", {
          action: "insert",
          tanggal: self.tanggal,
          jemput: self.jemput,
          tujuan: self.tujuan,
          pasien: self.pasien,
          usia: self.usia,
          status: self.status,
          unit: self.unit,
          plat: self.plat,
          jam: self.jam,
          rute: self.rute,
          pilot: self.pilot,
          copilot: self.copilot,
          cp: self.cp,
          flag: self.selected,
          img: self.pathImage,
          img1: self.pathImage1,
          img2: self.pathImage2,
        })
        .then(function(response) {
          self.myModel = false;
          self.fetchAllData();
          self.tanggal = "";
          self.jemput = "";
          self.tujuan = "";
          self.pasien = "";
          self.usia = "";
          self.status = "";
          self.unit = "";
          self.plat = "";
          self.jam = "";
          self.rute = "";
          self.pilot = "";
          self.copilot = "";
          self.cp = "";
          self.selected = 0;
          self.uploadedImage = "";
          self.uploadedImage1 = "";
          self.uploadedImage2 = "";
          self.pathImage = "";
          self.pathImage1 = "";
          self.pathImage2 = "";
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
          action: "fetchall",
        })
        .then(function(response) {
          self.laporan = response.data;
        });
    },
  },
  created: function() {
    let self = this;

    self.fetchAllData();
  },
};
</script>

<style scoped>
tbody tr:active {
  background-color: rgb(133, 152, 242);
  color: white;
}
</style>
