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
        <card shadow class="card-profile mt--300" no-body>
          <div class="px-4">
            <div class="row justify-content-center pb-5">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img v-lazy="'img/logo/cas.jpeg'" class="rounded-circle" />
                  </a>
                </div>
              </div>
            </div>
            <div class="text-center pt-5 mt-5">
              <h3>
                Cikarang Ambulans Service
                <!-- <span class="font-weight-light">, 27</span> -->
              </h3>
              <div class="h6 font-weight-300">
                <i class="ni location_pin mr-2"></i>Cikarang, Jawa Barat
              </div>
              <!-- <div class="h6 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager -
                Creative Tim Officer
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>University of Computer
                Science
              </div> -->
            </div>
            <div class="mt-5 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <p>
                    Cikarang Ambulans Service bergerak di bidang
                    transportasi/akomodasi ambulans untuk membantu umat, baik
                    pasien atau jenazah. Cikarang Ambulans Service telah
                    bersinergi dengan beberapa rumah sakit di Cikarang, Bekasi,
                    dan Karawang. <br />
                    <br />
                    Motto kami "Bergerak tanpa pamrih, Berbuat tanpa ingin
                    diberi" sehingga kami berusaha agar keluarga pasien/jenazah
                    merasa tidak terbebani dengan Tarif atau Ongkos pengantaran.
                    CAS juga bersinergi dengan Yayasan Yatim Piatu dan Duafa
                    Gema Insan Amanah. Sebagian dari yang telah kami terima akan
                    kami sumbangkan untuk yayasan yatim piatu dan dhuafa. <br />
                    <br />
                    CAS melayani pengantaran dan penjemputan pasien/jenazah
                    antar kota, antar propinsi, dan antar pulau. Unit yang telah
                    bersinergi denagn CAS sebanyak 7 unit (Ambulan Non-medis,
                    Ambulan Medis, dan Ambulan Jenazah)
                  </p>
                  <!-- <a href="#">Show more</a> -->
                </div>
              </div>
            </div>
          </div>
        </card>
      </div>
    </section>
  </div>
</template>
<script>
export default {};
</script>
<style></style>
