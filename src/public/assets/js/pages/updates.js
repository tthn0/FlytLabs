function updateThumbnailLabel() {
    let fileInput = document.getElementById("file");
    let fileName = fileInput.files[0].name;
    let fileInputLabel = document.querySelector("label[for='file']");
    fileInputLabel.innerHTML = `Selected file: ${fileName}`;
}