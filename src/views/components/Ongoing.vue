<template>
  <div>
    <section class="section section-lg pt-lg-0 mt-3">
      <div class="py-3 bg-primary">
        <div class="container">
          <h1 class="display-3 text-white">
            Service in Progress
          </h1>
          <span class="text-white">Cikarang Ambulans Service</span>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
              <div class="col-lg-12">
                <card class="border-0" shadow body-classes="py-5">
                  <div class="table-responsive-md">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Hari/Tanggal</th>
                          <th scope="col">Ambulance</th>
                          <th scope="col">Plat Nomor</th>
                          <th scope="col">Status Pasien</th>
                          <th scope="col">Penjemputan</th>
                          <th scope="col">Tujuan</th>
                          <th scope="col">CP Co-Pilot</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item in laporan" :key="item">
                          <th scope="row">{{ item.id }}</th>
                          <td>{{ item.tanggal }}</td>
                          <td>{{ item.unit }}</td>
                          <td>{{ item.plat }}</td>
                          <td>{{ item.status }}</td>
                          <td>{{ item.jemput }}</td>
                          <td>{{ item.tujuan }}</td>
                          <td>{{ item.cp }}</td>
                        </tr>
                        <!-- <tr>
                          <th scope="row">2</th>
                          <td>KAMIS 12 AGUSTUS 2021</td>
                          <td>CIKARANG AMBULANS SERVICE 005</td>
                          <td>B 7892 JKL</td>
                          <td>Kuning</td>
                          <td>Cikarang</td>
                          <td>Bekasi</td>
                          <td>081234567890</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>JUMAT 13 AGUSTUS 2021</td>
                          <td>CIKARANG AMBULANS SERVICE 007</td>
                          <td>B 9874 JKL</td>
                          <td>Hijau</td>
                          <td>Jakarta</td>
                          <td>Ciamis</td>
                          <td>081234567890</td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                </card>
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

export default {
  data() {
    return {
      laporan: "",
    };
  },
  methods: {
    fetchAllData: function() {
      let self = this;

      axios
        .post("action.php", {
          action: "ongoing",
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
