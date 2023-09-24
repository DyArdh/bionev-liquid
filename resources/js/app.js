import "./bootstrap";
import jQuery from "jquery";
import axios from "axios";
import select2 from "select2";
import Alpine from "alpinejs";

window.axios = axios;
window.$ = jQuery;
window.Select2 = select2;
window.Alpine = Alpine;

Alpine.start();
