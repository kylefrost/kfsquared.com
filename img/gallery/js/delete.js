function deleteFile(h) {
    var file = h.name;
    
    if (confirm("Are you sure you want to delete " + file + "?")) {
        var res = $.get("/img/gallery/php/delete.php", { filename: file }).done(function(data) {
                                                                    if (parseInt(data) == 0) {
                                                                        location.reload();
                                                                    } else {
                                                                        alert("The file could not be deleted.");
                                                                    }
                                                                });
    }
}
