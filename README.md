# Compra de Passagem

Este é um projeto desenvolvido como exercício para um curso de programação BackEnd na faculdade. Ele consiste em uma aplicação simples para compra de passagens de ônibus, com um formulário de compra e exibição das informações da passagem.

## Funcionalidades

- Formulário de compra de passagem com campos para nome, CPF, telefone e data de viagem.
- Geração automática de ID de passagem.
- Exibição das informações da passagem após a compra.

## Estrutura do Projeto

O projeto possui os seguintes arquivos e estrutura:

- **index.html**: Contém o formulário de compra de passagem.
- **script.js**: Lida com a lógica de compra e exibição das informações.
- **style.css**: Estiliza a página HTML.
- **/php/Conexao.php**: Arquivo para conexão com o banco de dados MySQL usando o padrão Singleton.

Além disso, foram criadas as seguintes classes PHP:

- **Motorista.php**: Representa um motorista de ônibus.
- **MotoristaDAO.php**: Classe para acesso aos dados dos motoristas no banco de dados.
- **Onibus.php**: Representa um ônibus da empresa.
- **OnibusDAO.php**: Classe para acesso aos dados dos ônibus no banco de dados.
- **Passageiro.php**: Representa um passageiro que compra uma passagem.
- **PassageiroDAO.php**: Classe para acesso aos dados dos passageiros no banco de dados.
- **Passagem.php**: Representa uma passagem de ônibus.
- **PassagemDAO.php**: Classe para acesso aos dados das passagens no banco de dados.
- **Rota.php**: Representa uma rota de viagem.
- **RotaDAO.php**: Classe para acesso aos dados das rotas no banco de dados.

## Banco de Dados

Foi criado um banco de dados MySQL chamado `companhia_de_onibus` com as seguintes tabelas:

- **motorista**: Armazena dados dos motoristas.
- **onibus**: Armazena dados dos ônibus, incluindo o motorista associado.
- **passageiro**: Armazena dados dos passageiros que compram passagens.
- **passagem**: Armazena os registros de passagens vendidas.
- **rota**: Armazena informações sobre as rotas de viagem.

## Como Executar

1. Certifique-se de ter um servidor web (como Apache) e um banco de dados MySQL configurados.
2. Importe o arquivo `dump.sql` para criar as tabelas e inserir dados iniciais no banco de dados.
3. Coloque os arquivos do projeto em um diretório acessível pelo servidor web.
4. Acesse a página `index.html` em seu navegador para começar a utilizar o sistema de compra de passagens.

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para enviar pull requests ou relatar problemas na seção de issues.
