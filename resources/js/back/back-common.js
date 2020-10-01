// Loader Function
const loader = function loader(type = 'show') {
    if (type == 'show') {
        return $('.loader').show();
    } else {
        return $('.loader').hide();
    }
}
window.loader = loader;

// Delete Confirm Alert
$(document).on('click', '.dc', function () {
    return confirm('Are you sure to remove?');
});

//Active Sidebar Menu
$('.treeview-menu li.active').closest('.treeview').addClass('active');

// Make Custom Alert


import Swal from 'sweetalert2';
// window.Swal = Swal;

// Alert Script
const Toast = Swal.mixin({
    toast: true,
    position: 'middle',
    showConfirmButton: false,
    background: '#E5F3FE',
    timer: 3000
});
window.Toast = Toast;

const cAlert = function cAlert(status = 'e', message = 'Something wrong!') {
    let icon;
    if (status == 's') {
        icon = 'success';
    } else if (status == 'us') {
        icon = 'success';
        message = 'Updated Successfully!';
    } else {
        icon = 'error';
    }
    return Toast.fire({
        icon: icon,
        title: message
    });
}
window.cAlert = cAlert;
