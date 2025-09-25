export async function getDataUsers() {
    try {
        const response = await fetch('../assets/files/utilizadores.json');

        // Lança um erro se a resposta não for bem-sucedida (ex: 404 Not Found)
        if (!response.ok) {
            throw new Error(`Erro ao carregar dados: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data; // Devolve o objeto JavaScript com os dados
    } catch (error) {
        console.error('Ocorreu um erro:', error);
        // Em caso de erro, devolve um array vazio para não quebrar o resto do código
        return [];
    }
}

export async function getDataPlayers() {
    try {
        const response = await fetch('../assets/files/jogadores.json');

        // Lança um erro se a resposta não for bem-sucedida (ex: 404 Not Found)
        if (!response.ok) {
            throw new Error(`Erro ao carregar dados: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        return data; // Devolve o objeto JavaScript com os dados
    } catch (error) {
        console.error('Ocorreu um erro:', error);
        // Em caso de erro, devolve um array vazio para não quebrar o resto do código
        return [];
    }
}