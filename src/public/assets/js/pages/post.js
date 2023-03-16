function submitForm(id) {
    let content = document.getElementById("body").innerHTML
    document.form.newBody.value = content;
    document.form.id.value = id;
    document.form.submit();
}

let editing = false;
function toggleEdit() {
    editing = !editing;
    document.querySelector("div.body").toggleAttribute("contenteditable");
    document.querySelector("i.fas").classList.toggle("fa-edit");
    document.querySelector("i.fas").classList.toggle("fa-ban");
    if (editing)
        var display = "inline-block";
    else
        var display = "none";
    document.querySelector("div.card button").style.display = display;
}

document.onkeydown = function (evt) {
    if (editing && (evt.key === "Escape" || evt.key === "Esc"))
        toggleEdit();
};

function goBack() {
    if (document.referrer === `${location.protocol}//${location.host}/updates`)
        history.back();
    else
        location.href = "/updates";
}