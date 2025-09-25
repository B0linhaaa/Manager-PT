export function importComponents() {
    let page = '';
    if (location.href.includes('treinos')) {
        page = 'treinos';
    } else if (location.href.includes('info')) {
        page = 'info';
    } else if (location.href.includes('jogos')) {
        page = 'jogos';
    } else if (location.href.includes('estatisticas')) {
        page = 'estatisticas';
    } else if (location.href.includes('classificacao')) {
        page = 'classificacao';
    } else {
        page = 'equipa';
    }

    // The file path to the component we want to include
    const navPath = 'assets/components/Header.html';

    // Use fetch to load the content
    fetch(navPath)
        .then(response => response.text())
        .then(html => {
            document.getElementById('header').innerHTML = html;

            console.log(page);

            let headerposition = '';
            let headerItem = 0;
            if (page === 'equipa' || page === 'treinos' || page === 'info') {
                headerposition = 'header-left';
                headerItem = (page === 'equipa' ? 0 : page === 'treinos' ? 1 : 2);
            } else {
                headerposition = 'header-right';
                headerItem = (page === 'jogos' ? 0 : page === 'estatisticas' ? 1 : 2);
            }

            const subHeader = document.getElementById(headerposition);
            subHeader.children[headerItem].classList.add('!bg-[#856c03]', '!text-white', 'pointer-events-none');
        })
        .catch(err => console.error('Erro ao carregar o cabeçalho:', err));
}







