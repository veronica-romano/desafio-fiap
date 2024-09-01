# DESAFIO FIAP - VERONICA ROMANO

## CRUD simples para gerenciamento de turmas, alunos e matrículas

### Instruções e usabilidade

- O script de criação do banco, tabelas e registros iniciais estão no arquivo dump.sql;

- O projeto foi construído em PHP puro com XAMPP, MySql, HTML5, CSS3, JQuery e Bootstrap. É importante o xampp instalado e clonar o projeto na pasta htdocs;

- Dependencias jQuery e Bootstrap referenciadas via CDN.

- É possível fazer Create, Read, Update e Delete nos campos Aluno, Matrícula e Turma;

- É possível navegar pelas páginas de Aluno, Matrícula e Turma;

- O sistema exibe mensagens mais amigávels nos erros 1451 e 1062, e no mínimo de letras para o nome do usuário, que foram os mais comuns nos testes;

- Os dados são mostrados por tabelas em JQuery, o que permite que o usuário ordene da maneira que preferir. Sendo ordem alfabética ou por identificados de usuário e registro;

- Também é possível filtrar alunos por meio da barra de pesquisa por letras ou números;


### Importante:

- Usuario e senha do bando de dados devem ser ajustados na sua versão;
- Antes de excluir um aluno, é necessário excluir todas as matrículas em que o aluno está;
- Antes de excluir uma turma, é necessário excluir todas as matrículas em que a turma está;


#### Pontos a melhorar:

- Dropdowns searchable para mais usabilidade;
- Não mostrar cursos onde o aluno já está matriculado;
- Refinar o código do foreach duplo nos dropdowns;
- Usar OOP;
- Usar frameworks mais elegantes;
- Autenticação por login e senha.
