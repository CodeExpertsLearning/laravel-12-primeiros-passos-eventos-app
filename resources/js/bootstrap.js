import axios from "axios";
import Inputmask from "inputmask";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.Inputmask = Inputmask;
