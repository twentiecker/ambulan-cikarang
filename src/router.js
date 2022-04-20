import Vue from "vue";
import Router from "vue-router";
import AppHeader from "./layout/AppHeader";
import AppFooter from "./layout/AppFooter";
import Components from "./views/Components.vue";
import Landing from "./views/Landing.vue";
import Login from "./views/Login.vue";
import Register from "./views/Register.vue";
import Profile from "./views/Profile.vue";
import Galery from "./views/Galery.vue";
import Report from "./views/Report.vue";
import Home from "./views/Home.vue";
import InputReport from "./views/components/InputReport.vue";
import InputGalery from "./views/components/InputGalery.vue";
import InputConfig from "./views/components/InputConfig.vue";

Vue.use(Router);

let router = new Router({
  linkExactActiveClass: "active",
  routes: [
    // {
    //   path: "/components",
    //   name: "components",
    //   components: {
    //     header: AppHeader,
    //     default: Components,
    //     footer: AppFooter,
    //   },
    // },
    // {
    //   path: "/landing",
    //   name: "landing",
    //   components: {
    //     header: AppHeader,
    //     default: Landing,
    //     footer: AppFooter,
    //   },
    // },
    {
      path: "/login",
      name: "login",
      components: {
        header: AppHeader,
        default: Login,
        footer: AppFooter,
      },
    },
    {
      path: "/register",
      name: "register",
      components: {
        header: AppHeader,
        default: Register,
        footer: AppFooter,
      },
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: "/profile",
      name: "profile",
      components: {
        header: AppHeader,
        default: Profile,
        footer: AppFooter,
      },
    },
    {
      path: "/galery",
      name: "galery",
      components: {
        header: AppHeader,
        default: Galery,
        footer: AppFooter,
      },
    },
    {
      path: "/report",
      name: "report",
      components: {
        header: AppHeader,
        default: Report,
        footer: AppFooter,
      },
    },
    {
      path: "/",
      name: "home",
      components: {
        header: AppHeader,
        default: Home,
        footer: AppFooter,
      },
    },
    {
      path: "/inputreport",
      name: "inputreport",
      components: {
        header: AppHeader,
        default: InputReport,
        footer: AppFooter,
      },
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: "/inputgalery",
      name: "inputgalery",
      components: {
        header: AppHeader,
        default: InputGalery,
        footer: AppFooter,
      },
      meta: {
        requiresAuth: true,
      },
    },
    // {
    //   path: "/inputconfig",
    //   name: "inputconfig",
    //   components: {
    //     header: AppHeader,
    //     default: InputConfig,
    //     footer: AppFooter,
    //   },
    //   meta: {
    //     requiresAuth: true,
    //   },
    // },
  ],
  scrollBehavior: (to) => {
    if (to.hash) {
      return { selector: to.hash };
    } else {
      return { x: 0, y: 0 };
    }
  },
});

// Meta Handling
router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (localStorage.getItem("user") == null) {
      next({
        path: "/login",
        params: { nextUrl: to.fullPath },
      });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
