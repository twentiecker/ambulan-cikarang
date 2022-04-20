<template>
  <header class="header-global">
    <base-nav class="navbar-main" transparent type="" effect="light" expand>
      <router-link slot="brand" class="navbar-brand mr-lg-3" to="/">
        <img
          v-lazy="'img/logo/cas_logo.png'"
          style="width: 300px;height: 75px"
        />
      </router-link>

      <div class="row" slot="content-header" slot-scope="{ closeMenu }">
        <div class="col-6 collapse-brand">
          <router-link slot="brand" class="navbar-brand mr-lg-3" to="/">
            <img
              v-lazy="'img/logo/cas.jpeg'"
              style="width: 36px;"
              class="rounded-circle m-1"
            />
          </router-link>
        </div>
        <div class="col-6 collapse-close">
          <close-button @click="closeMenu"></close-button>
        </div>
      </div>

      <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
        <router-link to="/" class="nav-link">
          <i class="fa fa-home d-lg-none" aria-hidden="true"></i>
          <span class="nav-link-inner--text">Home</span></router-link
        >
        <router-link to="/galery" class="nav-link">
          <i class="fa fa-file-image-o d-lg-none" aria-hidden="true"></i>
          <span class="nav-link-inner--text">Galery</span></router-link
        >

        <router-link to="/report" class="nav-link">
          <i class="fa fa-clipboard d-lg-none"></i>
          <span class="nav-link-inner--text">Report</span></router-link
        >

        <!-- <base-dropdown
          class="nav-item"
          menu-classes="dropdown-menu-xl"
          v-if="user"
        >
          <a
            slot="title"
            href="#"
            class="nav-link"
            data-toggle="dropdown"
            role="button"
          >
            <i class="ni ni-ui-04 d-lg-none"></i>
            <span class="nav-link-inner--text">Input</span>
          </a>
          <div class="dropdown-menu-inner">
            <router-link
              to="/inputreport"
              class="media d-flex align-items-center"
            >
              <div
                class="icon icon-shape bg-gradient-primary rounded-circle text-white"
              >
                <i class="ni ni-spaceship"></i>
              </div>
              <div class="media-body ml-3">
                <h6 class="heading text-primary mb-md-1">Service Report</h6>
                <p class="description d-none d-md-inline-block mb-0">
                  Input data pelayanan beserta foto dokumentasinya baik yang
                  sedang dalam proses maupun yang sudah selesai.
                </p>
              </div>
            </router-link>
            <router-link
              to="/inputgalery"
              class="media d-flex align-items-center"
            >
              <div
                class="icon icon-shape bg-gradient-warning rounded-circle text-white"
              >
                <i class="ni ni-ui-04"></i>
              </div>
              <div class="media-body ml-3">
                <h5 class="heading text-warning mb-md-1">Galery Ambulans</h5>
                <p class="description d-none d-md-inline-block mb-0">
                  Upload foto ambulans yang oleh Cikarang Ambulans Service.
                </p>
              </div>
            </router-link>
          </div>
        </base-dropdown> -->
        <!-- <base-dropdown tag="li" class="nav-item">
          <a
            slot="title"
            href="#"
            class="nav-link"
            data-toggle="dropdown"
            role="button"
          >
            <i class="ni ni-collection d-lg-none"></i>
            <span class="nav-link-inner--text">Input</span>
          </a>
          <router-link to="/landing" class="dropdown-item"
            ><i class="fa fa-clipboard"></i>
            <span class="nav-link-inner--text">Report</span></router-link
          >
          <router-link to="/landing" class="dropdown-item"
            ><i class="fa fa-clipboard"></i>
            <span class="nav-link-inner--text">Galery</span></router-link
          >
        </base-dropdown> -->
      </ul>
      <ul class="navbar-nav align-items-lg-center ml-lg-auto">
        <base-dropdown
          class="nav-item"
          menu-classes="dropdown-menu-xl"
          v-if="user"
        >
          <a
            slot="title"
            href="#"
            class="nav-link"
            data-toggle="dropdown"
            role="button"
          >
            <i class="ni ni-ui-04 d-lg-none"></i>
            <span class="nav-link-inner--text">Input</span>
          </a>
          <div class="dropdown-menu-inner">
            <router-link
              to="/inputreport"
              class="media d-flex align-items-center"
            >
              <div
                class="icon icon-shape bg-gradient-primary rounded-circle text-white"
              >
                <i class="ni ni-delivery-fast"></i>
              </div>
              <div class="media-body ml-3">
                <h6 class="heading text-primary mb-md-1">Service Report</h6>
                <p class="description d-none d-md-inline-block mb-0">
                  Input data pelayanan beserta foto dokumentasinya baik yang
                  sedang dalam proses maupun yang sudah selesai.
                </p>
              </div>
            </router-link>
            <router-link
              to="/inputgalery"
              class="media d-flex align-items-center"
            >
              <div
                class="icon icon-shape bg-gradient-primary rounded-circle text-white"
              >
                <i class="ni ni-ambulance"></i>
              </div>
              <div class="media-body ml-3">
                <h5 class="heading text-primary mb-md-1">Galery Ambulans</h5>
                <p class="description d-none d-md-inline-block mb-0">
                  Upload data dan foto ambulan yang terdaftar di Cikarang
                  Ambulans Service.
                </p>
              </div>
            </router-link>
            <router-link to="/register" class="media d-flex align-items-center">
              <div
                class="icon icon-shape bg-gradient-primary rounded-circle text-white"
              >
                <i class="ni ni-single-02"></i>
              </div>
              <div class="media-body ml-3">
                <h5 class="heading text-primary mb-md-1">Register User</h5>
                <p class="description d-none d-md-inline-block mb-0">
                  Membuat akun admin baru untuk website Cikarang Ambulans
                  Service
                </p>
              </div>
            </router-link>
            <!-- <router-link
              to="/inputconfig"
              class="media d-flex align-items-center"
            >
              <div
                class="icon icon-shape bg-gradient-primary rounded-circle text-white"
              >
                <i class="ni ni-settings-gear-65"></i>
              </div>
              <div class="media-body ml-3">
                <h5 class="heading text-primary mb-md-1">Web Configuration</h5>
                <p class="description d-none d-md-inline-block mb-0">
                  Input pengaturan umum yang akan ditampilkan pada website
                  seperti logo website dsb.
                </p>
              </div>
            </router-link> -->
          </div>
        </base-dropdown>
        <li class="nav-item" v-if="!user">
          <router-link to="/login" class="nav-link">
            <i class="fa fa-clipboard d-lg-none"></i>
            <span class="nav-link-inner--text">Login</span></router-link
          >
        </li>
        <li class="nav-item" v-if="user" @click="logout">
          <router-link to="" class="nav-link">
            <i class="fa fa-clipboard d-lg-none"></i>
            <span class="nav-link-inner--text">Logout</span></router-link
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link nav-link-icon"
            href="https://www.facebook.com/Cikarang-Ambulance-Siaga-102273218697627"
            target="_blank"
            rel="noopener"
            data-toggle="tooltip"
            title="Like us on Facebook"
          >
            <i class="fa fa-facebook-square"></i>
            <span class="nav-link-inner--text d-lg-none">Facebook</span>
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link nav-link-icon"
            href="https://www.instagram.com/cikarang_ambulansservice/"
            target="_blank"
            rel="noopener"
            data-toggle="tooltip"
            title="Follow us on Instagram"
          >
            <i class="fa fa-instagram"></i>
            <span class="nav-link-inner--text d-lg-none">Instagram</span>
          </a>
        </li>
      </ul>
    </base-nav>
  </header>
</template>
<script>
import BaseNav from "@/components/BaseNav";
import BaseDropdown from "@/components/BaseDropdown";
import CloseButton from "@/components/CloseButton";
import { mapGetters } from "vuex";

export default {
  components: {
    BaseNav,
    CloseButton,
    BaseDropdown,
  },
  methods: {
    logout() {
      this.$store.dispatch("user", null);
      localStorage.removeItem("user");
      this.$router.push("/");
    },
  },
  computed: {
    ...mapGetters(["user"]),
  },
};
</script>
<style></style>
