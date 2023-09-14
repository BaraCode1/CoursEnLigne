function myFunction()
{

 let x= document.getElementById("motDePasse1").value;
 let y= document.getElementById("motDePasse2").value;
 let message= document.getElementById("message");
 
 
 if(x!=y)
 {
      message.innerHTML="Le mot de passe ne match pas";
      y= document.getElementById("motDePasse2").value="";
      x= document.getElementById("motDePasse1").value="";
      message.style.backgroundColor="#ff4d4d";
 }
 else
 {
     
     message.innerHTML="Mot de passe correct";
     alert("Vous etes maintenant enregistre !");
     message.style.backgroundColor="#3ae374";
 }
 
}


