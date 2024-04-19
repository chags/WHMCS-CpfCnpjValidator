# WHMCS - Validador de CPF/CNPJ

Verificação se o CPF/CNPJ é válido, ele não verifica se exite na base do governo.
Verifica a duplicidade de CPF/CNPJ no cadastro do banco de dados do WHMCS.
Ajuda nas compra com PIX ou cartão aqui no Brasil pois as operadora só aceita transação com o CPF valido.

## Pré-requisitos

- Você deve ter acesso ao código-fonte do WHMCS para instalar este script.
- Certifique-se de ter permissões adequadas para modificar os arquivos do WHMCS.
- Você deve cria o campo customizado  `CPF ou CNPJ` no painel do WHMCS antes de instalar o arquivo.

## PASSO 1   Criação do campo CPF ou  CNPJ no WHMCS
-[ ] Acesse: Opções/Campos customizados.
-[ ] preencha com o primeiro imput com nome `CPF ou CNPJ`
-[ ] Os demais campos do formulario não precisa preencher conforme figura abaixo.
![Logo da Minha Empresa](https://repository-images.githubusercontent.com/789124373/a9d8bc18-39b6-4cef-b538-d16f28728703)

-[ ] Se você nunca criou um campo customizadonono no seu WHMCS o codigo já funciona, mas se ja tiver um campo criado você precisa fazer uma pequena alteração no codigo do arquivo `CpfCnpjValidator.php`,
-[ ] na linha 85 tem essa variável : 
```$customfield_cpf_cnpj = 1; //Substitua o numero 1 pelo numero do ID do seu campo custmoizado  ``` 
-[ ] Para saber o ID do campos da tabela: tblcustomfieldsvalues acesse o bancodo seu WHCMS


## PASSO 2 Instalação do aquivo no WHMCS

1. acesse se WHMCS via FTP na pasta  /includes/hooks  e coloque  o arquivo `CpfCnpjValidator.php` dentro da pasta hooks.

## PASSO 3 - Não tem passo 3 - pode usar kkkk

- Este script foi testado no WHMCS 8.9.0. 

## Suporte

Se você encontrar problemas durante a instalação ou tiver dúvidas sobre o funcionamento deste script, sinta-se à vontade para [abrir uma issue](link para as issues do GitHub) neste repositório.

## Contribua com um Café
Se esse código te fez economizar uma boa grana e aumentar seu tempo de diversão, eu acho que não vai te fazer falta um pequeno valor!
mas se você esta duro que eu duvido, pode pegar mesmo assim!!!kkkk 

chave aleatória do pix: 1f2fdb70-428b-4ccd-bf4a-475a317aa1be
Francisco cristiano Chagas
---


