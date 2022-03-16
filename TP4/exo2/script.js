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

function formattedDate(d = new Date()) {
  let month = String(d.getMonth() + 1);
  let day = String(d.getDate());
  const year = String(d.getFullYear());

  if (month.length < 2) month = "0" + month;
  if (day.length < 2) day = "0" + day;

  return `${year}-${month}-${day}`;
}

function getForm() {
  return toPerson(
    $("#inputNom").val(),
    $("#inputPrenom").val(),
    $("#inputDate").val(),
    document.getElementById("inputLike").checked,
    $("#inputRem").val()
  );
}

list.push(
  toPerson(
    "Misaka",
    "Mikoto",
    formattedDate(new Date(2018, 8, 22)),
    true,
    "Railgun <3"
  )
);
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
                        <button class="delBtn" onclick="deleteRow(this, ${i})">Delete</button>
                    </td>
                </tr>`
    );
  }
}

function addRow(person) {
  if (person.nom === "") {
    alert("Nom invalide");
  } else {
    postData(person);
    list.push(person);
  }
  displayTab();
}

function deleteRow(btn, index) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  if (index > -1) {
    list.splice(index, 1);
  }
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

  document.getElementById("inputNom").value = list[i].nom;
  document.getElementById("inputPrenom").value = list[i].prenom;
  document.getElementById("inputRem").value = list[i].rem;

  edit = true;
  global = i;
}

function postData(person) {
  console.log(person.date);
  $.ajax({
    method: "POST",
    url: "addUser.php",
    data: {
      nom: person.nom,
      prenom: person.prenom,
      date: person.date,
      like: person.like,
      rem: person.rem,
    },
  }).done(function (data) {
    var result = $.parseJSON(data);
    var str = "";
    var cls = "";
    if (result == 1) {
      str = "User record saved successfully.";
      cls = "success";
    } else if (result == 2) {
      str = "All fields are required.";
      cls = "error";
    } else if (result == 3) {
      str = "Enter a valid email address.";
      cls = "error";
    } else {
      str = "User data could not be saved. Please try again";
      cls = "error";
    }
    $("#message").show(3000).html(str).addClass("success").hide(5000);
  });
}
