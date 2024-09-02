# DESAFIO FIAP - VERONICA ROMANO

## CRUD simples para gerenciamento de turmas, alunos e matrículas

### Instruções e usabilidade

- O script de criação do banco, tabelas e registros iniciais estão no arquivo dump.sql;

- O projeto foi construído em PHP puro com XAMPP, MySql, HTML5, CSS3, JQuery, Chosen e Bootstrap. É importante o xampp instalado e clonar o projeto na pasta htdocs;

- Dependencias ou plugins jQuery e Bootstrap referenciadas via CDN com alguns detalhes no código.

- É possível fazer Create, Read, Update e Delete nos campos Aluno, Matrícula e Turma;

- É possível navegar pelas páginas de Aluno, Matrícula e Turma;

- O sistema exibe mensagens mais amigávels nos erros 1451 e 1062, e no mínimo de letras para o nome do usuário, que foram os mais comuns nos testes;

- Os dados são mostrados por tabelas em JQuery, o que permite que o usuário ordene da maneira que preferir. Sendo ordem alfabética ou por identificados de usuário e registro;

- Também é possível filtrar alunos por meio da barra de pesquisa por letras ou números;

- Usando o e plugin Chosen, é possível usar search em alguns Dropdowns.


### Importante:

- Usuario e senha do banco de dados devem ser ajustados no arquivo php.ini;
- Antes de excluir um aluno, é necessário excluir todas as matrículas refrentes ao aluno;
- Antes de excluir uma turma, é necessário excluir todas as matrículas referentes a turma;


#### Possíveis melhorias:

- Não mostrar cursos onde o aluno já está matriculado na tela de inserir a matrícula;
- Refinar o código do foreach duplo nos dropdowns;
- Usar OOP;
- Usar frameworks mais elegantes;
- Melhorar exibição de erros;
- Repensar a solução para validar usuário e nome de aluno e turma com Regex;
- Autenticação por login e senha.
