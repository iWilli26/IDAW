const Person = {
  String,
  String,
  Date,
  Boolean,
  String,
};
var global = 0;
var edit = false;
function toPerson(nom, prenom, date, like, rem) {
  let guy = Object.create(Person);
  guy.nom = nom;
  guy.prenom = prenom;
  guy.date = date;
  guy.like = like;
  guy.rem = rem;
  return guy;
}
var list = new Array();
function getForm() {
  return toPerson(
    $("#inputNom").val(),
    $("#inputPrenom").val(),
    $("#inputDate").val(),
    document.getElementById("inputLike").checked,
    $("#inputRem").val()
  );
}

function onFormSubmit() {
  event.preventDefault();
  if (edit === false) {
    addRow(getForm());
  } else {
    const person = getForm();
    list[global] = person;
    displayTab();
    edit = false;
  }
}

function displayTab() {
  $("#studentsTableBody tr").remove();
  for (let i = 0; i < list.length; i++) {
    $("#studentsTableBody").append(
      `<tr id="row${i}">
                    <td id="nom${i}">${list[i].nom}</td>
                    <td id="prenom${i}">${list[i].prenom}</td>
                    <td id="date${i}">${list[i].date} </td>
                    <td id="like${i}">${list[i].like} </td>
                    <td id="rem${i}">${list[i].rem} </td>
                    <td>
                        <button class="updBtn" onclick="updateRow(${i})">Update</button>
                        <button class="delBtn" onclick="deleteRow(this)">Delete</button>
                    </td>
                </tr>`
    );
  }
}
function addRow(person) {
  if (person.nom === "") {
    alert("Nom invalide");
  } else {
    list.push(person);
  }
  displayTab();
}

function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

function updateRow(i) {
  const element = document.getElementById(`row${i}`);
  for (let j = 0; j < list.length; j++) {
    if (i === j) {
      element.style.background = "red";
    } else {
      document.getElementById(`row${j}`).style.background = "none";
    }
  }
  edit = true;
  global = i;
}
