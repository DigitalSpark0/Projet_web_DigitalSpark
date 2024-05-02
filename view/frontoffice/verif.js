function verif() {
    Nom=document.getElementById('nom').value;
    Category=document.getElementById('category').value;
    Des=document.getElementById('des').value;
    Pcost=document.getElementById('pcost').value;
    Tache=document.getElementById('tache').value;
    var lettersOnly = /^[A-Za-z]+$/;
    var numbersOnly = /^[0-9]+$/;

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
    IDp=document.getElementById('idp').value;
    Nom=document.getElementById('nom').value;
    Des=document.getElementById('des').value;
    Notes=document.getElementById('notes').value;
    if (!IDp.match(numbersOnly) || IDp.length > 11 || IDp.value=="") {
        titreSpan.innerText = "verifier ID.";
        titreSpan.style.color = "red";
    }
    else 
    {
        titreSpan.innerText = "ID est valide.";
        titreSpan.style.color = "green";
        return false;
    }

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