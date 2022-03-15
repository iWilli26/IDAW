const Person = {
  String,
  String,
  Date,
  Boolean,
  String,
};

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
  event.preventDefault();
  let nom = $("#inputNom").val();
  let prenom = $("#inputPrenom").val();
  let date = $("#inputDate").val();
  let like = document.getElementById("inputLike").checked;
  let rem = $("#inputRem").val();
  return toPerson(nom, prenom, date, like, rem);
}

function onFormSubmit() {
  addRow(getForm());
}

function displayTab() {
  $("#studentsTableBody tr").remove();
  for (let i = 0; i < list.length; i++) {
    $("#studentsTableBody").append(
      `<tr id="row${i}">
                    <td>${list[i].nom}</td>
                    <td>${list[i].prenom}</td>
                    <td>${list[i].date} </td>
                    <td>${list[i].like} </td>
                    <td>${list[i].rem} </td>
                    <td>
                        <button class="updBtn" onclick="updateRow(${i})">Update</button>
                        <button class="delBtn" onclick="deleteRow(this)">Delete</button>
                    </td>
                </tr>`
    );
  }
  //   list.map((person) => {
  //     $("#studentsTableBody").append(
  //       `<tr id='${person.nom}${person.prenom}'>
  //                   <td>${person.nom}</td>
  //                   <td>${person.prenom}</td>
  //                   <td>${person.date} </td>
  //                   <td>${person.like} </td>
  //                   <td>${person.rem} </td>
  //                   <td>
  //                       <button class="updBtn" onclick="updateRow(this)">Update</button>
  //                       <button class="delBtn" onclick="deleteRow(this)">Delete</button>
  //                   </td>
  //               </tr>`
  //     );
  //   });
}
function addRow(person) {
  const element = document.getElementsByClassName("error")[0];
  if (person.nom === "") {
    element.innerHTML = "Y'a pas de nom";
  } else {
    list.push(person);
    element.innerHTML = "";
  }
  displayTab();
}
function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

function updateRow(i) {
  const element = document.getElementById(`row${i}`);
  element.style.background = "red";
  const btn = document.getElementById("subBtn");
  btn.addEventListener("click", () => {
    const person = getForm();
    list[i] = person;
    displayTab();
  });
}
