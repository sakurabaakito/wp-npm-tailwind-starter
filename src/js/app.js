import alpine from "./modules/alpine";
import swiper from "./modules/swiper";
import tags from "./modules/tags";
import headerHeight from "./modules/headerHeight";
import headerBottom from "./modules/headerBottom";

window.addEventListener("DOMContentLoaded", () => {
    alpine();
    swiper();
    tags();
    headerHeight();
    headerBottom();
});

