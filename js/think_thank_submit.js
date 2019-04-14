//Think form handling
function ThinkFunc(){

// Initialize Firebase
var config = {
    apiKey: "AIzaSyAMyCy02RMstcKMguVIBTz2mhaMVRfU458",
    authDomain: "nss-webpage.firebaseapp.com",
    databaseURL: "https://nss-webpage.firebaseio.com",
    projectId: "nss-webpage",
    storageBucket: "nss-webpage.appspot.com",
    messagingSenderId: "291956089635"
  };
  firebase.initializeApp(config);

  // Reference think thank collection
var ThinkRef=firebase.database().ref('ThinkIdea');

document.getElementById('ThinkThankForm').addEventListener('submit',submitForm);

//Submit form
function submitForm(e){
    e.preventDefault();

//Get values
var name= getInputVal('TName');
var email= getInputVal('TEmail');
var phone= getInputVal('TPhone');
var thought= getInputVal('TThought');

//Save Message
saveMessage(name,email,phone,thought);

//Show alert
document.querySelector('.alert').style.display='block';

//Hide alert after 3seconds
setTimeout(function(){
    document.querySelector('.alert').style.display='none';
},3000);

document.getElementById('ThinkThankForm').reset();
}

//Function to get form values
function getInputVal(id){
    return document.getElementById(id).value;
}

//Save form to firebase
function saveMessage(name,email,phone,thought){
    var  newThinkRef=ThinkRef.push();
    newThinkRef.set({
        Name: name,
        Email: email,
        Phone: phone,
        Thought: thought
    });
}
}

//----------------------------------------------------------//

//Thank Form Handling
function ThankFunc(){

    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyAMyCy02RMstcKMguVIBTz2mhaMVRfU458",
        authDomain: "nss-webpage.firebaseapp.com",
        databaseURL: "https://nss-webpage.firebaseio.com",
        projectId: "nss-webpage",
        storageBucket: "nss-webpage.appspot.com",
        messagingSenderId: "291956089635"
      };
      firebase.initializeApp(config);
    
      // Reference think thank collection
    var ThankRef=firebase.database().ref('ThankFeedback');
    
    document.getElementById('ThinkThankForm').addEventListener('submit',submitForm);
    
    //Submit form
    function submitForm(e){
        e.preventDefault();
    
    //Get values
    var name= getInputVal('TName');
    var email= getInputVal('TEmail');
    var phone= getInputVal('TPhone');
    var thought= getInputVal('TThought');
    
    //Save Message
    saveMessage(name,email,phone,thought);
    
    //Show alert
    document.querySelector('.alert').style.display='block';
    
    //Hide alert after 3seconds
    setTimeout(function(){
        document.querySelector('.alert').style.display='none';
    },3000);
    
    document.getElementById('ThinkThankForm').reset();
    }
    
    //Function to get form values
    function getInputVal(id){
        return document.getElementById(id).value;
    }
    
    //Save form to firebase
    function saveMessage(name,email,phone,thought){
        var  newThankRef=ThankRef.push();
        newThankRef.set({
            Name: name,
            Email: email,
            Phone: phone,
            Thought: thought
        });
    }
    }