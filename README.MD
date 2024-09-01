# DESAFIO FIAP - VERONICA ROMANO

## CRUD simples para gerenciamento de turmas, alunos e matrículas

- O script de criação do banco, tabelas e registros iniciais estão no arquivo dump.sql;

- O projeto foi construído em PHP puro com XAMPP, MySql, HTML5, CSS3 e Bootstrap;

- É possível fazer Create, Read, Update e Delete nos campos Aluno, Matrícula e Turma;

- As tabelas são mostradas por JQuery, o que permite que o usuário ordene da maneira que preferir;

- Também é possível filtrar alunos por meio da barra de pesquisa;


### Importante:

- Antes de excluir um aluno, é necessário excluir todas as matrículas em que o aluno está;
- Antes de excluir uma turma, é necessário excluir todas as matrículas em que a turma está;


Pontos a melhorar:

- Lidar com erros procurando matrícula por aluno e turma. Caso já exista, retornar mensagem de erro. Caso não exista, gravar e retornar mensagem de sucesso;
- Não mostrar cursos onde o aluno já está matriculado;
- Refinar o código do foreach duplo;
- Usar OOP.