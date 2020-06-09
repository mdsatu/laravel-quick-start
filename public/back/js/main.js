// Loader Function
function loader(type = 'show') {
    if (type == 'show') {
        $('.loader').show();
    } else {
        $('.loader').hide();
    }
}

// Delete Confirm Alert
$(document).on('click', '.dc', function() {
    return confirm('Are you sure to remove?');
});

//Active Sidebar Menu
$('.treeview-menu li.active').closest('.treeview').addClass('active');

// Alert Script
const Toast = Swal.mixin({
    toast: true,
    position: 'middle',
    showConfirmButton: false,
    background: '#E5F3FE',
    timer: 3000
});

function alert(status = 'e', message = 'Something wrong!') {
    let icon;
    if (status == 's') {
        icon = 'success';
    } else if (status == 'us') {
        icon = 'success';
        message = 'Updated Successfully!';
    } else {
        icon = 'error';
    }
    Toast.fire({
        icon: icon,
        title: message
    });
}