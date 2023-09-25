import "./bootstrap";
import jQuery from "jquery";
import axios from "axios";
import select2 from "select2";
import Alpine from "alpinejs";
import dayjs from "dayjs";
import Chart from "chart.js/auto";

window.axios = axios;
window.$ = jQuery;
window.Select2 = select2;
window.Alpine = Alpine;
window.dayjs = dayjs;
window.Chart = Chart;

Alpine.start();
