var form = document.getElementById("uploadForm");
var fileSelect = document.getElementById("uploadField");
var uploadButton = document.getElementById("uploadButton");

form.onsubmit = function(e) {
    e.preventDefault();

    uploadButton.innerHTML = "Uploading...";
    uploadButton.disabled = true;

    var files = fileSelect.files;
    var formData = new FormData();

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        formData.append('files[]', file, file.name);
    }

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'php/upload.php', true);

    xhr.onload = function() {
        if (xhr.status == 200 && xhr.response == "0") {
            location.reload();
        } else {
            console.log(xhr.response);
            alert("Files could not be uploaded.");
        }
    };

    xhr.send(formData);
};
