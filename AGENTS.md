## Estrutura de diretórios
- ``plugins/`` referente a alterações que manipula o menu Plugins no wp-admin/
- ``options/`` referente a alterações que manipula o menu Settings no wp-admin/
- ``posts/`` referente a alterações que manipula os posts e pages do WordPress

## Code Style
- Utilizar o Coding Standards do WordPress
- Utilizar boas práticas da documentação do WordPress
- Utilizar OOP na criação de novas funcionalidades
- As classes criadas devem ter o prefixo ``Gm<NomeDaClasse>``
- Nas funções e métodos informar o tipo dos parametros e o retorno
- Não utilizar comentários no código
- Utilizar boas práticas de código limpo

## PR Instruções
- Utilizar os tipos``fix`` para correções, ``hotfix`` para problemas de segurança, erros críticos e urgentes, ``feat`` para funcionalidades novas e ``setting`` para arquivos de configurações
- Formato do título: ``<tipo>: <Title>``