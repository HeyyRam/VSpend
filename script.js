function validateForm() {
  // Get the values of the input fields
  const category = document.getElementById("category").value;
  const name = document.getElementById("name").value;
  const amount = document.getElementById("amount").value;
  const date = document.getElementById("date").value;
  const today = new Date();
  const expenseDate = new Date(date);

  // Check if all the required fields have been filled out
  if (category === "" || name === "" || amount === "" || date === "") {
    alert("Please fill out all the required fields.");
    return false;
  }

  else if(!name_valid()){
    alert("Please enter a valid name.");
    return false;
  }

  // Check if the amount is a number
  else if (isNaN(amount)) {
    alert("Please enter a valid amount.");
    return false;
  }

  else{
    return true;
  }

  // If all the checks pass, allow the form to be submitted
  
}

function name_valid(){
  const name = document.getElementById("name").value;
  for(let i=0;i<name.length;i++){
    if(!isNaN(name[i])){
      return false;
    }
  }
  return true;

}
