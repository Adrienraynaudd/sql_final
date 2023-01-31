document.getElementById("filtre").addEventListener('click', async function () {
    const filtre = document.createElement("div")
    filtre.setAttribute("id", "popFiltre")
    filtre.classList.add("popFiltre")
    filtre.innerHTML = `
    <div class="close" id="close"> </div>
    <div class="divFiltre">
    <form action="employes.php" method="get">
        Date de naissance : <br>
        Début <input type="date" name="Startdate"><br>  
        Fin <input type="date" name="Enddate"><br> <br> 
        Genre : <br> 
        <input type="checkbox" name="genreMale" value="Male"> Masculin <br>
        <input type="checkbox" name="genreFemale" value="Female"> Féminin <br><br> 
        Salaire : <br>
        Minimum <input type="number" name="salaireMin"> <br>
        Maximum <input type="number" name="salaireMax"> <br> <br>
        <input type="submit" value="Actualisé"><br> 
    </form>
    </div>
    `
    document.getElementById("container").appendChild(filtre)
    document.getElementById("close").addEventListener('click', async function () {
        document.getElementById("popFiltre").remove();
    });
});

