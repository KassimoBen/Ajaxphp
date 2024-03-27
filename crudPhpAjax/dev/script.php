<script src="../jquery-3.6.0.min.js">
</script>
<script type="text/javascript">
function submitData(action) {

    $(document).ready(function() {
        let tab = [];
        var n1 = $(".info").prop('checked');
        var res1 = $(".info").val();
        var n2 = $(".btp").prop('checked');
        var res2 = $(".btp").val();
        var n3 = $(".gm").prop('checked');
        var res3 = $(".gm").val();
        var n4 = $(".env").prop('checked');
        var res4 = $(".env").val();
        if (n1) {
            tab.push(res1);
        }
        if (n2) {
            tab.push(res2);
        }
        if (n3) {
            tab.push(res3);
        }
        if (n4) {
            tab.push(res4);
        }
        valSelectione = $("input[type='radio'][name='sexe']:checked").val()
        var check = tab.join(","); //split("")

        var data = {
            action: action,
            id: $("#id").val(),
            name: $("#name").val(),
            email: $("#email").val(),
            gender: $("#gender").val(),
            check_insert: check,
            radio_insert: valSelectione
        };
        $.ajax({
            url: 'function.php',
            type: 'post',
            data: data,
            success: function(response) {
                alert(response);
                if (response == "supprimer") {
                    $("#" + action).css("display", "none");
                } else if (response == "mise à jour avec successé") {
                    window.location.href = "./index.php";
                } else if (response == "l'enregistrement est sucsée") {
                    $("#name").val(""),
                        $("#email").val(""),
                        $("#gender").val("");
                }
            }
        })
    });
}
</script>