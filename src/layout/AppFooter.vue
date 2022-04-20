<template>
  <footer class="footer has-cards">
    <!-- <div class="container container-lg">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <div class="card card-lift--hover shadow border-0">
            <router-link to="/landing" title="Landing Page">
              <img v-lazy="'img/theme/landing.jpg'" class="card-img" />
            </router-link>
          </div>
        </div>
        <div class="col-md-6 mb-5 mb-lg-0">
          <div class="card card-lift--hover shadow border-0">
            <router-link to="/profile" title="Profile Page">
              <img v-lazy="'img/theme/profile.jpg'" class="card-img" />
            </router-link>
          </div>
        </div>
      </div>
    </div> -->
    <div class="container">
      <div class="row row-grid my-md">
        <div class="col-lg-6">
          <h3 class="text-primary font-weight-light mb-2">
            Contact us!
          </h3>
          <!-- <h4 class="mb-0 font-weight-light">
            Let's get in touch on any of these platforms.
          </h4> -->
          <div class="row">
            <div class="col-0 ml-4">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
            </div>
            <div class="col">
              <p>
                <strong>Address</strong>
                <br />
                Kp. Sempu Kramat RT/ RW 004/004, Pasir Gombong, Kec. Cikarang
                Utara, Kab. Bekasi
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-0 ml-4">
              <i class="fa fa-phone" aria-hidden="true"></i>
            </div>
            <div class="col">
              <p>
                <strong>Call Centre</strong>
                <br />
                0812-8634-5626
              </p>
            </div>
          </div>
          <div class="col-0 ml-2">
            <a
              target="_blank"
              rel="noopener"
              href="https://www.instagram.com/cikarang_ambulansservice/"
              class="btn btn-neutral btn-icon-only btn-instagram btn-round btn-lg"
              data-toggle="tooltip"
              data-original-title="Follow us"
            >
              <i class="fa fa-instagram"></i>
            </a>
            <a
              target="_blank"
              rel="noopener"
              href="https://www.facebook.com/Cikarang-Ambulance-Siaga-102273218697627"
              class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg"
              data-toggle="tooltip"
              data-original-title="Like us"
            >
              <i class="fa fa-facebook-square"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6 p-2">
          <h3 class="text-primary font-weight-light mb-2">
            Location
          </h3>
          <div class="col-0 ml-3">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.832429132148!2d107.14143891476947!3d-6.285745795450553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6985369c428399%3A0x360c20f1c1e3bc6a!2sSEKERTARIAT%20CIKARANG%20AMBULANS%20SERVICE!5e0!3m2!1sen!2sid!4v1629638318771!5m2!1sen!2sid"
              width="100%"
              height="200"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
            ></iframe>
          </div>
        </div>
      </div>
      <hr />
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; {{ year }}
            <span>Cikarang Ambulans Service</span>
          </div>
        </div>
        <!-- <div class="col-md-6">
          <ul class="nav nav-footer justify-content-end">
            <li class="nav-item">
              <a
                href="https://www.creative-tim.com"
                class="nav-link"
                target="_blank"
                rel="noopener"
                >Creative Tim</a
              >
            </li>
            <li class="nav-item">
              <a
                href="https://www.creative-tim.com/presentation"
                class="nav-link"
                target="_blank"
                rel="noopener"
                >About Us</a
              >
            </li>
            <li class="nav-item">
              <a
                href="http://blog.creative-tim.com"
                class="nav-link"
                target="_blank"
                rel="noopener"
                >Blog</a
              >
            </li>
            <li class="nav-item">
              <a
                href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md"
                class="nav-link"
                target="_blank"
                rel="noopener"
                >MIT License</a
              >
            </li>
          </ul>
        </div> -->
      </div>
    </div>
  </footer>
</template>
<script>
export default {
  name: "app-footer",
  data() {
    return {
      year: new Date().getFullYear(),
    };
  },
};
</script>
