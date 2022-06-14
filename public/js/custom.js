// let role = $('#role');

// role.change(roleschange);
// $(document).ready(roleschange);

// function roleschange() {

//     var roleval, matric, level, staff_id, pass;

//     matric = $('#matric');
//     level = $('#level');
//     staff_id = $('#staff_id');
//     roleval = $('#role').val();
//     pass = document.querySelector('#c_pass');

//     switch (roleval) {
//         case '1':
//         case '2':
//             // admin
//             matric.hide('slow');
//             level.hide('slow');
//             staff_id.show('slow');
//             pass.classList.replace('col-lg-12', 'col-lg-6');
//             break;

//         case '3':
//             // student
//             matric.show('slow');
//             level.show('slow');
//             staff_id.hide('slow');
//             pass.classList.replace('col-lg-6', 'col-lg-12');
//             break;

//         default:
//             matric.hide('slow');
//             level.hide('slow');
//             // pass.classList.replace('col-lg-12', 'col-lg-6');
//             break;
//     }
// }
