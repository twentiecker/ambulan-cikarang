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
                  Galery
                  <span>Cikarang Ambulans Service</span>
                </h1>
                <p class="lead  text-white">
                  Cikarang Ambulans Service menyediakan 3 tipe ambulan yang siap
                  melayani Anda
                </p>
                <ul class="list-unstyled mt-5">
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <badge
                        type="primary"
                        circle
                        class="mr-3"
                        icon="ni ni-ambulance"
                      ></badge>
                      <h5 class="mb-0" style="color: white">
                        Ambulan Non-medis + Jenazah
                      </h5>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <badge
                        type="primary"
                        circle
                        class="mr-3"
                        icon="ni ni-ambulance"
                      ></badge>
                      <h5 class="mb-0" style="color: white">
                        Ambulan Medis + Jenazah
                      </h5>
                    </div>
                  </li>
                </ul>
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
              <div class="col-lg-1"></div>
              <div class="col-lg-11">
                <div class="col-lg-10 mb-lg-auto">
                  <div
                    class="rounded shadow-lg overflow-hidden transform-perspective-right"
                  >
                    <b-carousel id="carousel1" controls indicators>
                      <!-- Text slides with image -->
                      <b-carousel-slide
                        v-for="ambulan in galeri"
                        :key="ambulan"
                        :img-src="ambulan.img"
                      ></b-carousel-slide>
                      <!-- <b-carousel-slide
                        img-src="img/car/car2.jpg"
                      ></b-carousel-slide> -->
                    </b-carousel>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { BCarousel } from "bootstrap-vue/esm/components/carousel/carousel";
import { BCarouselSlide } from "bootstrap-vue/esm/components/carousel/carousel-slide";
const axios = require("axios");

export default {
  components: {
    BCarousel,
    BCarouselSlide,
  },
  data() {
    return {
      galeri: "",
    };
  },
  methods: {
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
