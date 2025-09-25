// import { importComponents } from './importComponents.js';
// import { getDataUsers, getDataPlayers } from './getData.js';

async function runFunctions() {
    // A variável 'users' só terá os dados quando a função terminar de ser executada
    // const users = await getDataUsers();
    // const players = await getDataPlayers();
    // console.log(users);
    // console.log(players);

    // document.getElementById('players-table').innerHTML += `
    //     <table class="text-white border-collapse border border-white">
    //         <thead>
    //             <tr>
    //                 <th class="border text-left p-2">Nome</th>
    //                 <th class="border p-2">Data de Nascimento</th>
    //             </tr>
    //         </thead>
    //         <tbody>
    //             ${players.map(player => `<tr><td class="p-2 border">${player.name}</td><td class="text-center p-2 border">${player.dateOfBirth}</td></tr>`).join('')}
    //         </tbody>
    //     </table>
    // `;
}

addEventListener("DOMContentLoaded", (event) => {
    console.log("DOMContentLoaded");

    // importComponents();
    runFunctions();

    // const page = localStorage.getItem('page');
    // console.log(page);

    // O Código abaixo está a fazer uma requisição AJAX
    // const response = await fetch(url_do_script_php, {
    //     method: 'POST', // O método POST é usado para 'salvar' ou modificar dados
    //     headers: {
    //         'Content-Type': 'application/json'
    //     }
    //     // ...
    // });
});




