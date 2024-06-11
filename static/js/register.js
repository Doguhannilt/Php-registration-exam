$(document).ready(function() {
    $('#registerForm').on('submit', function(e) {
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
            url: './actions/register.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#loadingIndicator').hide();

        
                if (response.success) {
                    toastr.success(response.message);
                    sessionStorage.setItem('login_page_message', response.message);
                    window.location.href = './login.html';
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                $('#loadingIndicator').hide();

                var errorMessage = 'Bilinmeyen bir hata oluştu: ' + error;
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                toastr.error(errorMessage);
            }
        });
    });
});
