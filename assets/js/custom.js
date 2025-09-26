document.addEventListener('DOMContentLoaded', () => {
    const tabela = document.querySelector('#tabela-presencas-container table');

    if (tabela) {
        tabela.addEventListener('click', (event) => {
            if (event.target.tagName === 'TD' && event.target.dataset.pessoaId) {
                handleAttendanceClick(event);
            }
        });
    } else {
        console.error('Tabela de presenças não encontrada.');
    }
});

function handleAttendanceClick(event) {
    const celula = event.target;
    switch (celula.dataset.status) {
        case 'P':
            celula.dataset.status = 'F';
            celula.textContent = 'F';
            break;
        case 'F':
            celula.dataset.status = '';
            celula.textContent = '';
            break;
        case '':
            celula.dataset.status = 'P';
            celula.textContent = 'P';
            break;
    }

    const allCells = document.querySelectorAll('td[data-pessoa-id="' + celula.dataset.pessoaId + '"]');
    const dataByMonth = {};
    allCells.forEach(cell => {
        const mesAno = cell.dataset.mesAno;
        const dia = cell.dataset.dia;
        const status = cell.dataset.status;

        if (!dataByMonth[mesAno]) {
            dataByMonth[mesAno] = {};
        }

        if (status) {
            dataByMonth[mesAno][dia] = status;
        }
    });

    const faultsInputs = document.querySelector('input[name="faults-' + celula.dataset.pessoaId + '"]');
    faultsInputs.value = JSON.stringify(dataByMonth);
}


