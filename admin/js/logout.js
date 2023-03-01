function beforeLogout() {
    var yes     = translations["A00056"][language]; /* Yes */
    var message = translations['A00769'][language] + '?'; /* Are you sure you want to logout */
    var title   = translations["A00770"][language]; /* Logout */
    var alert   = translations['A00727'][language] + '!'; /* Error */
    var canvasBtnArray = Array(yes);
    showMessage(message, 'info', title, 'sign-out', '', canvasBtnArray);
    $('#canvas'+yes+'Btn').click(function() {
        $.ajax({
            type: 'POST',
            url: 'scripts/reqLogin.php',
            data: {type : "logout"},
            success	: function(result) {
                window.location.href = 'pageLogin.php';
            },
            error	: function(result) {
                alert(alert);
            }
        });
    });
}