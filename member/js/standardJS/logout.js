function beforeLogout() {
    var yes     = translations["M00140"][language]; /* Yes */
    var message = translations['M00141'][language] + '?'; /* Are you sure you want to logout */
    var title   = translations["M00142"][language]; /* Logout */
    var alert   = "Error";
    var canvasBtnArray = {
        'Yes' : yes
    };
    showMessage(message, 'warning', title, 'sign-out', '', canvasBtnArray);
    $('#canvasYesBtn').click(function() {
        $.ajax({
            type: 'POST',
            url: 'scripts/reqLogin.php',
            data: {type : "logout"},
            success	: function(result) {
                window.location.href = 'login';
            },
            error	: function(result) {
                alert(alert);
            }
        });
    });
}