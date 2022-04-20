<template>
  <section class="section section-lg section-shaped overflow-hidden my-0">
    <div class="shape shape-style-1 shape-default shape-skew">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container py-5 my-5 pb-lg">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-5 mb-5 mb-lg-0">
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
                  icon="ni ni-settings-gear-65"
                ></badge>
                <h5 class="mb-0" style="color: white">
                  Ambulan Non-medis
                </h5>
              </div>
            </li>
            <li class="py-2">
              <div class="d-flex align-items-center">
                <badge
                  type="primary"
                  circle
                  class="mr-3"
                  icon="ni ni-html5"
                ></badge>
                <h5 class="mb-0" style="color: white">
                  Ambulan Medis
                </h5>
              </div>
            </li>
            <li class="py-2">
              <div class="d-flex align-items-center">
                <badge
                  type="primary"
                  circle
                  class="mr-3"
                  icon="ni ni-satisfied"
                ></badge>
                <h5 class="mb-0" style="color: white">Ambulan Jenazah</h5>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-lg-6 mb-lg-auto">
          <div
            class="rounded shadow-lg overflow-hidden transform-perspective-right"
          >
            <b-carousel id="carousel1" controls indicators>
              <!-- Text slides with image -->
              <b-carousel-slide img-src="img/car/car1.jpg"></b-carousel-slide>
              <b-carousel-slide img-src="img/car/car2.jpg"></b-carousel-slide>
              <b-carousel-slide img-src="img/car/car3.jpg"></b-carousel-slide>
              <b-carousel-slide img-src="img/car/car4.jpg"></b-carousel-slide>
              <b-carousel-slide img-src="img/car/car5.jpg"></b-carousel-slide>
              <b-carousel-slide img-src="img/car/car6.jpg"></b-carousel-slide>
              <b-carousel-slide img-src="img/car/car7.jpg"></b-carousel-slide>
            </b-carousel>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { BCarousel } from "bootstrap-vue/esm/components/carousel/carousel";
import { BCarouselSlide } from "bootstrap-vue/esm/components/carousel/carousel-slide";

export default {
  components: {
    BCarousel,
    BCarouselSlide,
  },
};
</script>
<style></style>
