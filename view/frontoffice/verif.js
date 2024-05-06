
function verifNom() {
    var Nom=document.getElementById('nom').value;
    var lettersOnly = /^[A-Za-z]+$/;
    if(!Nom.match(lettersOnly) || Nom.length > 100 || Nom.value=="")
    {
        titreSpan.innerText = "verifier nom.";
        titreSpan.style.color = "red";
    }
    else 
    {
        titreSpan.innerText = "nom est valide.";
        titreSpan.style.color = "green";
        return false;
    }
}
    
        
function verifDes() {
    var Des=document.getElementById('des').value;
    var lettersOnly = /^[A-Za-z]+$/;
    if(!Des.match(lettersOnly) || Des.length > 100 || Des.value=="")
        {
            titreSpan.innerText = "verifier description.";
            titreSpan.style.color = "red";
        }
        else 
        {
            titreSpan.innerText = "description est valide.";
            titreSpan.style.color = "green";
            return false;
        }
}
    
function verifPcost() {
    var Pcost=document.getElementById('pcost').value;
    var numbersOnly = /^[0-9]+$/;
    if(!Pcost.match(numbersOnly) || Pcost.length > 11 || Pcost.value=="")
        {
            titreSpan.innerText = "verifier projectCost.";
            titreSpan.style.color = "red";
        }
        else 
        {
            titreSpan.innerText = " projectCostest valide.";
            titreSpan.style.color = "green";
            return false;
        }
}
    
function verifTache() {
    var Tache=document.getElementById('tache').value;
    
    if(!Tache.match(lettersOnly) || Tache.length > 100 || Tache.value=="")
        {
            titreSpan.innerText = "verifier tache.";
            titreSpan.style.color = "red";
        }
        else 
        {
            titreSpan.innerText = "tache est valide.";
            titreSpan.style.color = "green";
            return false;
        }
}
    


function verift() {
    
    Nom=document.getElementById('nom').value;
    Des=document.getElementById('des').value;
    
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
    if(!Notes.match(lettersOnly) || Notes.length > 100 || Notes.value=="")
        {
            titreSpan.innerText = "verifier notes.";
            titreSpan.style.color = "red";
        }
        else 
        {
            titreSpan.innerText = "tache est notes.";
            titreSpan.style.color = "green";
            return false;
        }
}
    
