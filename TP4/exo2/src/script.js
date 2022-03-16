const Person = {
  id: Number,
  nom: String,
  prenom: String,
  date: Date,
  like: Boolean,
  rem: String,
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
getData();

function formattedDate(d = new Date()) {
  let month = String(d.getMonth() + 1);
  let day = String(d.getDate());
  const year = String(d.getFullYear());

  if (month.length < 2) month = "0" + month;
  if (day.length < 2) day = "0" + day;

  return `${year}-${month}-${day}`;
}

function getPerson() {
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
  var person = getPerson();
  if (edit === false) {
    addRow(person);
  } else {
    updateData(person);
  }
}

function displayTab() {
  $("#studentsTableBody tr").remove();
  for (let i = 0; i < list.length; i++) {
    $("#studentsTableBody").append(
      `<tr id="row${i}">
                    <td id="id${i}">${list[i].id}</td>
                    <td id="nom${i}">${list[i].nom}</td>
                    <td id="prenom${i}">${list[i].prenom}</td>
                    <td id="date${i}">${list[i].date} </td>
                    <td id="like${i}">${list[i].like == 1 ? "Oui" : "Non"} </td>
                    <td id="rem${i}">${list[i].rem} </td>
                    <td>
                        <button class="updBtn" onclick="updateRow(${
                          list[i].id
                        }, ${i})">Update</button>
                        <button class="delBtn" onclick="deleteUser(${
                          list[i].id
                        })">Delete</button>
                    </td>
                </tr>`
    );
  }
}

function addRow(person) {
  if (person.nom === "" || person.prenom === "") {
    alert("Nom invalide");
  } else {
    postData(person);
  }
}

var selectedRowId;
function updateRow(id, index) {
  selectedRowId = id;
  const element = document.getElementById(`row${index}`);
  for (let j = 0; j < list.length; j++) {
    if (index === j) {
      element.style.background = "red";
    } else {
      document.getElementById(`row${j}`).style.background = "none";
    }
  }

  document.getElementById("inputNom").value = list[index].nom;
  document.getElementById("inputPrenom").value = list[index].prenom;
  document.getElementById("inputRem").value = list[index].rem;
  document.getElementById("inputDate").value = list[index].date;
  document.getElementById("inputLike").checked =
    list[index].like == 1 ? true : false;

  edit = true;
  global = index;
}

function postData(person) {
  $.ajax({
    method: "POST",
    url: "../request/addUser.php",
    data: {
      id: person.id,
      nom: person.nom,
      prenom: person.prenom,
      date: person.date,
      like: person.like,
      rem: person.rem,
    },
  }).done(function (data) {
    getData();
  });
}

function updateData(person) {
  $.ajax({
    method: "POST",
    url: "../request/updateUser.php",
    data: {
      id: selectedRowId,
      nom: person.nom,
      prenom: person.prenom,
      date: person.date,
      like: person.like,
      rem: person.rem,
    },
  }).done(function (data) {
    getData();
    edit = false;
  });
}

function getData() {
  $.ajax({
    method: "POST",
    url: "../request/getAllUser.php",
  })
    .done((response) => {
      list = JSON.parse(response);
      displayTab();
    })
    .catch(function (error) {
      console.log(error);
    });
}

function deleteUser(id) {
  $.ajax({
    method: "POST",
    url: "../request/deleteUser.php",
    data: {
      id: id,
    },
  })
    .done((response) => {
      getData();
    })
    .catch(function (error) {
      console.log(error);
    });
}
