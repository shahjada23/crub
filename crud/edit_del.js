
//  JavaScript For Edit Btn

edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("edit ");
    tr = e.target.parentNode.parentNode;
    title = tr.getElementsByTagName("td")[0].innerText;
    description = tr.getElementsByTagName("td")[1].innerText;
    console.log(title, description);
    titleEdit.value = title;
    desEdit.value = description;
    idedit.value = e.target.id;
    console.log(e.target.id)
    $('#editModal').modal('toggle');
  })
})


//  JavaScript For delete btn

deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("edit ");
    sno = e.target.id.substr(1);

    if (confirm("Are you sure you want to delete this note!")) {
      console.log("yes");
      window.location = `/crud/index.php?delete=${sno}`;
      // TODO: Create a form and use post request to submit a form
    }
    else {
      console.log("no");
    }
  })
})
