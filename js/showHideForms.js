function showGroupForm() {
    document.getElementById('groupFormDiv').style.display = "block";
    document.getElementById('pickLessonTable').style.display = "none";
}

function showPrivateForm() {
    document.getElementById('privateFormDiv').style.display = "block";
    document.getElementById('pickLessonTable').style.display = "none";
}

function backToPickTable() {
    document.getElementById('privateFormDiv').style.display = "none";
    document.getElementById('groupFormDiv').style.display = "none";
    document.getElementById('pickLessonTable').style.display = "block";
}