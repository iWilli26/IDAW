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
  const date = datetoString($("#inputDate").val());
  return toPerson(
    $("#inputNom").val(),
    $("#inputPrenom").val(),
    date,
    document.getElementById("inputLike").checked,
    $("#inputRem").val()
  );
}
let options = {
  timeZone: "GMT",
  weekday: "long",
  year: "numeric",
  month: "long",
  day: "numeric",
};
function datetoString(date) {
  return date.toLocaleString("us-US");
}

var d = new Date(Date.UTC(2000, 6, 20));

list.push(toPerson("Misaka", "Mikoto", d, true, "Railgun <3"));
displayTab();

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
  console.log(document.getElementById("inputDate").value);
  console.log(list[i].date);
  document.getElementById("inputNom").value = list[i].nom;
  document.getElementById("inputPrenom").value = list[i].prenom;
  document.getElementById("inputDate").value = list[i].date;
  document.getElementById("inputRem").value = list[i].rem;

  edit = true;
  global = i;
}
