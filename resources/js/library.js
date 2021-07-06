// vForm
import {Form, HasError, AlertError} from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);


// ES6 Modules or TypeScript
import Swal from 'sweetalert2';
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});
window.Toast = Toast;

//Progress bar
import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar, {
    color: '#faa21c',
    failedColor: 'red',
    height: '8px',
    thickness: '4px',
});
