import "./bootstrap";

import Alpine from "alpinejs";

import { showToast } from "./toast";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    if (window.sessionSuccess) {
        showToast(window.sessionSuccess, "success");
    }
    if (window.sessionError) {
        showToast(window.sessionError, "error");
    }
});
