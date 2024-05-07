
function verifNom() {
    var Nom=document.getElementById('nom').value;
    var Nomspan=document.getElementById('nomspan');
    var lettersOnly = /^[A-Za-z]+$/;
    if(!Nom.match(lettersOnly) || Nom.length > 100 || Nom.value=="")
    {
        Nomspan.innerText = "verifier nom.";
        Nomspan.style.color = "red";
    }
    else 
    {
        Nomspan.innerText = "nom est valide.";
        Nomspan.style.color = "green";
        return false;
    }
}
    
        
function verifDes() {
    var Des=document.getElementById('des').value;
    var lettersOnly = /^[A-Za-z]+$/;
    var Descriptionspan=document.getElementById('descriptionspan');
    if(!Des.match(lettersOnly) || Des.length > 100 || Des.value=="")
        {
            Descriptionspan.innerText = "verifier description.";
            Descriptionspan.style.color = "red";
        }
        else 
        {
            Descriptionspan.innerText = "description est valide.";
            Descriptionspan.style.color = "green";
            return false;
        }
}
    
function verifPcost() {
    var Pcost=document.getElementById('pcost').value;
    var numbersOnly = /^[0-9]+$/;
    var Costspan=document.getElementById('costspan');
    if(!Pcost.match(numbersOnly) || Pcost.length > 11 || Pcost.value=="")
        {
            Costspan.innerText = "verifier projectCost.";
            Costspan.style.color = "red";
        }
        else 
        {
            Costspan.innerText = " projectCostest valide.";
            Costspan.style.color = "green";
            return false;
        }
}
    
function verifTache() {
    var Tache=document.getElementById('tache').value;
    var Tachespan=document.getElementById('tachespan');
    if(!Tache.match(lettersOnly) || Tache.length > 100 || Tache.value=="")
        {
            Tachespan.innerText = "verifier tache.";
            Tachespan.style.color = "red";
        }
        else 
        {
            Tachespan.innerText = "tache est valide.";
            Tachespan.style.color = "green";
            return false;
        }
}
    
function verifIDp() {
    var IDp=document.getElementById('idp').value;
    var IDspan=document.getElementById('idspan');
    var numbersOnly = /^[0-9]+$/;
    if (!IDp.match(numbersOnly) || IDp.length > 11 || IDp.value=="") {
        IDspan.innerText = "verifier ID.";
        IDspan.style.color = "red";
    }
    else 
    {
        IDspan.innerText = "ID est valide.";
        IDspan.style.color = "green";
        return false;
    }
}
    
function verifNotes() {
    var Notes=document.getElementById('notes').value;
    var lettersOnly = /^[A-Za-z]+$/;
    var Notespan=document.getElementById('notespan');
    if(!Notes.match(lettersOnly) || Notes.length > 100 || Notes.value=="")
        {
            Notespan.innerText = "verifier notes.";
            Notespan.style.color = "red";
        }
        else 
        {
            Notespan.innerText = "tache est notes.";
            Notespan.style.color = "green";
            return false;
        }
}
    
