// Initialize Firebase
var config = {
  apiKey: 'AIzaSyAMyCy02RMstcKMguVIBTz2mhaMVRfU458',
  authDomain: 'nss-webpage.firebaseapp.com',
  databaseURL: 'https://nss-webpage.firebaseio.com',
  projectId: 'nss-webpage',
  storageBucket: 'nss-webpage.appspot.com',
  messagingSenderId: '291956089635'
};
firebase.initializeApp(config);

// Reference blood collection
var bloodRef = firebase.database().ref('requestBlood');

document.getElementById('bloodRequestForm')
    .addEventListener('submit', submitForm);

// Submit form
function submitForm(e) {
  e.preventDefault();

  // Get values
  var name = getInputVal('BName') var id_roll = getInputVal('BRoll') var email =
      getInputVal('BEmail') var phone = getInputVal('BPhone') var for_whom =
          getInputVal('BForWhom') var address = getInputVal('BAddress')

  // Save Message
  saveMessage(name, id_roll, email, phone, for_whom, address);

  // Show alert
  document.querySelector('.alert').style.display = 'block';

  // Hide alert after 3seconds
  setTimeout(function() {
    document.querySelector('.alert').style.display = 'none';
  }, 3000);

  document.getElementById('bloodRequestForm').reset();
  }

// Function to get form values
function getInputVal(id) {
  return document.getElementById(id).value;
  }

// Save form to firebase
function saveMessage(name, id_roll, email, phone, for_whom, address) {
  var newBloodRef = bloodRef.push();
  newBloodRef.set({
    name: name,
    id_roll: id_roll,
    email: email,
    phone: phone,
    blood_for_whom: for_whom,
    address: address
  });
}