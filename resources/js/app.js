import Alpine from "alpinejs";
import LocomotiveScroll from "locomotive-scroll";

window.Alpine = Alpine;
window.scroll = new LocomotiveScroll({
  el: document.querySelector("[data-scroll-container]"),
  smooth: true,
});

Alpine.start();
