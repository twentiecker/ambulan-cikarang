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
                  Report
                  <span>Cikarang Ambulans Service</span>
                </h1>
                <p class="lead  text-white">
                  Pelayanan yang telah kami lakukan terdokumentasi dengan baik
                  dalam sebuah laporan tertulis yang akan selalu diupdate secara
                  berkala setiap kami selesai melakukan suatu pelayanan ambulan.
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
                    <h3 class="text-primary font-weight-light mb-2">
                      Click for detail report!
                    </h3>
                    <!-- <h6><i>*) click for detail report</i></h6> -->
                    <!-- <b-table
                      id="my-table"
                      :items="laporan"
                      :per-page="perPage"
                      :current-page="currentPage"
                      small
                    ></b-table> -->
                    <table class="table caption-top">
                      <thead>
                        <tr>
                          <th scope="col">Hari/Tanggal</th>
                          <th scope="col">Pasien</th>
                          <th scope="col">Unit Ambulan</th>
                        </tr>
                      </thead>
                      <tbody
                        v-for="item in laporan"
                        :key="item"
                        @click="detail(item)"
                      >
                        <tr class="clickable-row">
                          <td>{{ item.tanggal }}</td>
                          <td>{{ item.pasien }}</td>
                          <td>{{ item.unit }}</td>
                        </tr>
                      </tbody>
                      <!-- <tbody
                        v-for="item in dummy"
                        :key="item"
                        @click="detail(item)"
                      >
                        <tr class="clickable-row">
                          <th scope="row">{{ item.id }}</th>
                          <td>{{ item.tanggal }}</td>
                          <td>{{ item.pasien }}</td>
                          <td>{{ item.unit }}</td>
                        </tr>
                      </tbody> -->
                    </table>
                    <div>
                      <!-- <b-pagination
                        v-model="currentPage"
                        :total-rows="rows"
                        :per-page="perPage"
                        aria-controls="my-table"
                      ></b-pagination> -->
                      <base-pagination
                        :x="10"
                        v-model="pagination.default"
                      ></base-pagination>
                    </div>
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
                        <div class="col-lg">
                          <!-- Tabs with icons -->
                          <tabs fill class="flex-column flex-md-row">
                            <card shadow slot-scope="{ activeTabIndex }">
                              <tab-pane key="tab1">
                                <template slot="title">
                                  <i class="ni ni-cloud-upload-96 mr-2"></i
                                  >Laporan
                                </template>

                                <h6>
                                  FORM LAPORAN GIAT CIKARANG AMBULANS SERVICE
                                </h6>
                                <p>
                                  HARI/TGL : {{ modal.tanggal }} <br />
                                  PENJEMPUTAN : {{ modal.jemput }} <br />
                                  TUJUAN : {{ modal.tujuan }} <br />
                                  NAMA PASIEN : {{ modal.pasien }} <br />
                                  USIA : +- {{ modal.usia }} TH<br />
                                  STATUS PASIEN : {{ modal.status }} <br />
                                  UNIT : {{ modal.unit }} <br />
                                  PLAT NO : {{ modal.plat }} <br />
                                  JAM BERANGKAT : {{ modal.jam }} <br />
                                  RUTE : {{ modal.rute }} <br />
                                  PILOT : {{ modal.pilot }} <br />
                                  CO.PILOT : {{ modal.copilot }}
                                </p>
                                <p>
                                  _________ <br />
                                  Atas respon dan partisipasi rekan2 relawan
                                  kami ucapkan terimakasih, Semoga tuhan selalu
                                  memberikan berkah & keselamatan untuk kita
                                  semua.
                                </p>
                                <br />
                                <h6>
                                  Bekerja dengan hati, Berbuat dengan ikhlas
                                </h6>
                                <h6>Hormat kami</h6>
                                <p>---------------------</p>
                                <h6>
                                  Cikarang Ambulans Service <br />
                                  Koordinasi Info Ambulance <br />
                                  Perkumpulan Ambulans Cikarang Karawang
                                </h6>
                              </tab-pane>

                              <tab-pane key="tab2">
                                <template slot="title">
                                  <i class="ni ni-bell-55 mr-2"></i>Dokumentasi
                                </template>

                                <b-carousel id="carousel1" controls indicators>
                                  <!-- Text slides with image -->
                                  <b-carousel-slide
                                    v-if="modal.img"
                                    :img-src="modal.img"
                                  ></b-carousel-slide>
                                  <b-carousel-slide
                                    v-if="modal.img1"
                                    :img-src="modal.img1"
                                  ></b-carousel-slide>
                                  <b-carousel-slide
                                    v-if="modal.img2"
                                    :img-src="modal.img2"
                                  ></b-carousel-slide>

                                  <!-- <b-carousel-slide
                                    img-src="img/car/car3.jpg"
                                  ></b-carousel-slide>
                                  <b-carousel-slide
                                    img-src="img/car/car4.jpg"
                                  ></b-carousel-slide>
                                  <b-carousel-slide
                                    img-src="img/car/car5.jpg"
                                  ></b-carousel-slide> -->
                                </b-carousel>
                              </tab-pane>
                            </card>
                          </tabs>
                        </div>
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
import Modal from "@/components/Modal.vue";
import Tabs from "@/components/Tabs/Tabs.vue";
import TabPane from "@/components/Tabs/TabPane.vue";

export default {
  components: {
    Modal,
    Tabs,
    TabPane,
  },
  data() {
    return {
      myModel: false,
      modal: "",
      laporan: "",
      // pagination: {
      //   default: 1,
      //   danger: 3,
      // },
      // perPage: 2,
      // currentPage: 1,
      // dummy: [
      //   {
      //     id: "1",
      //     tanggal: "12345",
      //     pasien: "JOKO",
      //     unit: "001",
      //   },
      //   {
      //     id: "2",
      //     tanggal: "78901",
      //     pasien: "TONO",
      //     unit: "004",
      //   },
      // ],
    };
  },
  computed: {
    rows() {
      return this.laporan.length;
    },
  },
  methods: {
    detail(itemModal) {
      this.modal = itemModal;
      this.myModel = true;
    },
    fetchAllData: function() {
      let self = this;

      axios
        .post("action.php", {
          action: "report",
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
