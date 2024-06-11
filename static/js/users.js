window.onload = function () {
    const message = sessionStorage.getItem('users_page_message');

    if (message) {
        toastr.success(message);
        sessionStorage.removeItem('users_page_message');
    }   
};


$(document).ready(function(){
    $.ajax({
        url: './actions/get_users.php',
        type: 'GET',
        dataType: 'json',
        success: function(response){
            if(response.success){
                let users = response.data;
                let userTableBody = $('#userTableBody');
                users.forEach(function(user){
                    let row = `<tr>
                        <td>${user.first_name}</td>
                        <td>${user.last_name}</td>
                        <td>${user.email}</td>
                        <td>${user.birth_date}</td>
                        <td>${user.register_date}</td>
                    </tr>`;
                    userTableBody.append(row);
                });
            } else {
                toastr.error('Kullanıcılar yüklenirken bir hata oluştu.');
            }
        },
        error: function(){
            toastr.error('Sunucuya bağlanırken bir hata oluştu.');
        }
    });
});