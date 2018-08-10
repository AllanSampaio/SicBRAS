<p align="center">![][http://1.bp.blogspot.com/_YMjrin1Fa20/Szrj3PPI3nI/AAAAAAAAADY/fWuFnhJ1Jn0/s320/sicbras.jpg "SiCBRAS"]</p>

1. [Configura��es do Projeto][#1-configuracoes-do-projeto]
2. [Organiza��o do Projeto][#2-organizacao-do-projeto]
3. [Orienta��es sobre o Versionamento][#3-orientacoes-sobre-o-versionamento]

# 1. Configura��es do Projeto
## Pr�-Requisitos
- PHP $\geq$ 7.1.3
- Composer
- Git
- MySQL (Pode ser XAMPP, LAMP, etc)

## Baixando o projeto
1. Forke este reposit�rio para a sua conta no GitHub;
2. Clone o reposit�rio forkado para a sua m�quina. Caso n�o saiba muito bem como usar o Git, [clique aqui](https://blog.dmatoso.com/usando-git-e-github-no-windows-a059c791c0af).

## Banco de Dados
1. Crie um banco de dados do tipo "utf8mb4_general_ci";
2. V� na pasta do projeto e renomeie o arquivo ".env.example" para ".env";
3. Configure o arquivo ".env" com as suas configura��es de banco de dados. A maioria provavelmente s� vai precisar configurar o nome do banco, do usu�rio e a senha.

## Rodando o Projeto
1. No terminal do computador, v� at� a pasta do projeto e execute `composer install`;
2. Ainda no terminal, execute o comando `php artisan migrate`;
3. Execute o comando `php artisan serve`. Esse �ltimo comando sempre precisar� ser executado para abrir a conex�o.
4. Estarte o banco de dados, caso n�o esteja. Se o banco de dados n�o estiver estartado, o acesso ao sistema interno n�o ocorrer�. 

# 2. Organiza��o do Projeto
- Cada m�dulo tem uma pasta pr�pria para as Views `( resources-> views )`. 
- Cada m�dulo tem uma pasta pr�pria para os Controllers `( app-> Http-> Controllers )`.
- Cada m�dulo tem uma pasta pr�pria para as Models `( app-> Models )`.
- Cada m�dulo tem uma parte pr�pria pra colocar as rotas `( routes )` dentro de "web.php".
- A p�gina do menu est� em `config-> adminlte.php`. Cada equipe ir� gerenciar os subitens do seu m�dulo.

# 3. Orienta��es sobre o Versionamento
- Sempre que fizer alguma altera��o no projeto, voc� precisa commitar e enviar para o seu reposit�rio local e depois enviar um Pull Request para esse reposit�rio aqui, para que todos tenham um �nico reposit�rio (esse aqui) com as atualiza��es mais recentes. Para saber como proceder, [clique aqui](https://blog.da2k.com.br/2015/02/04/git-e-github-do-clone-ao-pull-request/). Mas antes disso, voc� precisa atualizar seu reposit�rio com as atualiza��es desse reposit�rio aqui (caso hajam), pois se outra pessoa tiver editado o mesmo arquivo que voc�, o pull n�o poder� ser efetuado. Para saber como sempre deixar seu reposit�rio com as atualiza��es desse aqui, [clique aqui](https://gist.github.com/rdeavila/9618969);
- Mantenha o projeto o mais organizado poss�vel; 
- Sempre que for criar algum arquivo para seu m�dulo, organize-o dentro das pr�prias pastas de cada m�dulo. Caso n�o haja a pasta, crie uma;
- Havendo qualquer inten��o de mudan�a estrutural no projeto de modo que possa impactar nos outros m�dulos, a solicita��o deve ser conversada antes com a equipe de Integra��o ou bem justificada no Pull Request, de modo a ser repassada posteriormente para as outras equipes.