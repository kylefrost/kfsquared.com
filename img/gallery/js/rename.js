function editName(h) {
    var file = h.name;
    
    var newName = prompt("What would you like " + file + " to be named?");

    if (newName != null) {
        if (confirm("Are you sure you want to rename " + file + " to " + newName + "?")) {
            var res = $.get("/img/gallery/php/edit.php", { filename: file, newname: newName }).done(function(data) { 
                                                                                        if (parseInt(data) == 0) {
                                                                                            location.reload();
                                                                                        } else {
                                                                                            alert("There was an error renaming the file.");
                                                                                        }
                                                                                    });
        }
    }
}
