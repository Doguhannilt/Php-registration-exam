window.onload = function () {
    const message = sessionStorage.getItem('login_page_message');

    if (message) {
        toastr.success(message);
        sessionStorage.removeItem('login_page_message');
    }
};

$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serializeArray();
        var valid = true;

        formData.forEach(function(field) {
            if (!field.value) {
                valid = false;
                toastr.error(field.name + ' alanı boş olamaz');
            }
        });

        if (!valid) {
            return;
        }

        $('#loadingIndicator').show();

        $.ajax({
            type: 'POST',
            url: './actions/login.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#loadingIndicator').hide();

                if (response.success) {
                    toastr.success(response.message);
                    sessionStorage.setItem('users_page_message', response.message);
                    window.location.href = './users.html';
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr, status, error) {                $('#loadingIndicator').hide();

                var errorMessage = 'Bilinmeyen bir hata oluştu: ' + error;
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                toastr.error(errorMessage);
            }
        });
    });
});
