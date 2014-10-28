
function myFunction(id) {
    var x;
    if (confirm("Confirm deletion of user  " + id + " ? ") == true) {
        x = "You pressed OK!";
        window.location.replace("../models/delete.php?id="+id+"&type=users");
    } else {
        x = "You pressed Cancel!";
        window.location.replace("/user/views/view_list.php");
        return false;
    }
}

