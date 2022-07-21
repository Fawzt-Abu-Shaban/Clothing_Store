import './bootstrap';
window.Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
        toastr.success( notification.msg , 'congratz')
    });
